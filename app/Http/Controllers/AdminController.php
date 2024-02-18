<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view("admin.Index");
    }

    function manage_premium_users(){
        $updateUsers=User::all();
        return view("admin.manage-premium-users", ["updateUsers"=>$updateUsers]);
    }

    function deleteUser($id){
        $deleteUser=User::find($id);
        $deleteUser->delete();
        return back();
    }

    function editUser($id){
        $editUser=User::find($id);
        return view('admin.edit-user', ["editUser" => $editUser]);  
    }

    function updateUser($id){
        $validation=request()->validate([
            'username'=>'required',
            'email'=>'required'
        ]);
        if($validation){
            $updateUser=User::find($id);
            $updateUser->name=request('username');
            $updateUser->email=request('email');
            $updateUser->isAdmin=request('isAdmin');
            $updateUser->isPremium=request('isPremium');
            $updateUser->save();

            return back()->with("update", "Updated user successfully!");
        }else{
            return back()->withErrors($validation);
        }
    }

    function contact_messages(){
        $messages=ContactMessage::latest()->get();
        return view("admin.contact-messages", ['messages'=>$messages]);
    }
}
