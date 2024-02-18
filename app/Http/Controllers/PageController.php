<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() {
        $posts=Post::latest()->get();
        return view('Index', ['posts'=>$posts]);
    }

    function createPost(){
        return view('user.Create');
    }
    function userProfile(){
        return view('user.UserProfile');
    }


    function seemore($id){
        $post=Post::find($id);
        return view('user.Seemore', ["post"=>$post]);
    }

    function editPost($id){
        $edit_post=Post::find($id);
        return view('user.EditPost', ["edit_post" => $edit_post]);
    }

    function contactUs(){
        return view('user.ContactUs');
    }
}
