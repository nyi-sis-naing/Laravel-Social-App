<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    function login(){  
        return view("auth.Login");
    }

    function post_login(){   
        //validate data
        $validation=request()->validate([
            "email"=>"required", 
            "password"=>"required",
        ]);

        if($validation){
            //if auth success
        $auth=Auth::attempt(["email"=>request('email'), "password"=>request('password')]);
        if($auth){
            //go to home page
            return redirect()->route("home");

            }else{
                return back()->with('error', 'authentication failed try again');
            }
        }else{
            //back to login with errors
            return back()->withErrors($validation);
        }

    }

    //regiser
    function regiser(){
        return view("auth.Register");
    }

    //post register
    function post_register(){
        $validation=request()->validate([
            "username" => "required",
            "email" => "required",
            "password" => "required||min:8",
            "image" => "required" ,
        ]);
        if($validation){
            //save to user table
            $image=request('image'); //move to image folder
            $image_name=uniqid()."_".$image->getClientOriginalName(); //save to database
            $image->move(public_path('images/profiles'), $image_name);

            $password=$validation['password'];
            $user=new User();
            $user->name=$validation['username'];
            $user->email=$validation['email'];
            $user->password=Hash::make($password);
            $user->image=$image_name;
            $user->save();
            
            //cus it tales a moment to save in database
            if(Auth::attempt(["email"=>request('email'), "password"=>request('password')])){
                return redirect()->route("home");
            }
            
        }else{
            return back()->withErrors($validation);
        }
    }

    function post_userProfile(){
        $name=request('name');
        $email=request('email');
        $image=request('image');
        $old_password=request('old_password');
        $new_password=request('new_password');

        //if password and image didnt change
        $id=auth()->user()->id;
        $current_user=User::find($id);
        $current_user->name=$name;
        $current_user->email=$email;

        //if image change
        if($image){
            //move to public folder
            $imageName=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles/'), $imageName);
            //save image name to db
            $current_user->image=$imageName;
            $current_user->update();
            return back()->with('success', 'image changed');
        }

        if($old_password && $new_password){
            if(Hash::check($old_password, $current_user->password)){
                $current_user->password=Hash::make($new_password);
                $current_user->update();
                return back()->with('success', 'password changed');
            }else{
                return back()->with('error', 'password does not match');
        }
        }
        $current_user->update();
        return back();
    }

    function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
