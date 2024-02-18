<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function post_contactus(){
        $validation=request()->validate([
            "username" => "required",
            "email" => "required",
            "message" => "required"
        ]);
        if($validation){
            $username=request('username');
            $email=request('email');
            $message=request('message');

            $contactMessage=new ContactMessage();
            $contactMessage->username=$username;
            $contactMessage->email=$email;
            $contactMessage->message=$message;
            $contactMessage->save();

            return back()->with("sent", "sent to admin successfully!");
        }else{
            return back()->withErrors($validation);
        }
    }

    function deleteMessage($id){
        $delete_message=ContactMessage::find($id);
        $delete_message->delete();
        return back();
    }

    function editMessage($id){
        $update_message=ContactMessage::find($id);
        return view('admin.edit_message', ["update_message" => $update_message]);
    }

    function updateMessage($id){
        $updateMessage=ContactMessage::find($id);
        $updateMessage->username=request('username');
        $updateMessage->email=request('email');
        $updateMessage->message=request('message');
        $updateMessage->save();

        return redirect()->route('admin.contact_messages');
    }
}
