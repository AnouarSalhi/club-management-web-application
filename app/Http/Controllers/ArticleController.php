<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $c =Comment::where('article_id','=',$id)->get();
        $count =Comment::where('article_id','=',$id)->count();
        $post=Article::find($id);
        $user=User::find($post->user_id);
        
        return view('show',[
            "id"=>$post->id,
            "title"=>$post->title,
            "body"=>$post->body,
            "name"=>$user->name,
            "time"=>$post->created_at,
            "image"=>$post->image,
            "number"=>$count,
            "comments"=>$c,
            "user_comment"=>$user->name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $article =new Article();
        $article->user_id=Auth::user()->id;
        $article->body=$request->input('body');
        if($request->hasFile('upload')){
            $filename=$request->upload->getClientOriginalName();
            //$article->image=$request->getClientOriginalName();
            
            $article->image=$request->upload->store('image','public');
        }
        
        $article->save();
       return  redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
