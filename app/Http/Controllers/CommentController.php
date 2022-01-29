<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request,$id)
    {
        $comment =new Comment();
        $comment->user_id=auth::id();
        $comment->article_id=$id;
        $comment->body=$request->input('body');    
        $comment->save();
       return  redirect()->back();
    }
}
