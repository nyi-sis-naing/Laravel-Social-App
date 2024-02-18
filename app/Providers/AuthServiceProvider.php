<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate as FacadesGate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        FacadesGate::define("admin", function(User $user){
            return $user->isAdmin=="1";
        });

        FacadesGate::define("premiumAdminPostowner", function(User $user, $id){
            $post_data=Post::find($id);
            $postOwnerId=$post_data->user_id;
            return $user->isPremium=="1" || $user->isAdmin=="1" || $user->id==$postOwnerId;
        });
    }
}
