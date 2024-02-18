<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
        // click post button
        function post(){
            $validation=request()->validate([
                'title'=>'required',
                'image'=>'required',
                'content'=>'required'
            ]);
            if($validation){
                $title=request('title');
                $image=request('image');
                $content=request('content');
    
                // save in db
                $post=new Post();
                $post->user_id=auth()->user()->id;
                $post->title=$title;
                $post->content=$content;
                // image
                $imageName=uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path("images/posts/"), $imageName);
                $post->image=$imageName;
                $post->save();
                return redirect()->route('home');
            }
        }

        function updatePost($id){
            $update_post=Post::find($id);
            $update_post->title=request('title');
            $update_post->content=request('content');
            // image
            $image=request('image');
            if($image){
                $imageName=uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('images/posts/'), $imageName);
                $update_post->image=$imageName;
                $update_post->save();
    
                return redirect()->route('home');
            }
        }
    
    
        function deletePost($id){
            $delete_post=Post::find($id);
            $delete_post->delete();
            return redirect()->route('home');
        }
}
