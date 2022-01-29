<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;
use App\Article;
use App\Contact;
use Illuminate\Support\Facades\Auth;
class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workshop',[
            "Formation"=>Formation::orderBy('id', 'DESC')->paginate(4)
        ]);
    }
    public function search(Request $request)
    {      $x=$request->input('t');
         $a=Formation::orderBy('id', 'DESC')->where('body','like','%'.$x.'%')->paginate(4);
        return view('workshop',[
            "Formation"=>$a
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $article =new Formation();
        $article->user_id=Auth::user()->id;
        $article->body=$request->input('body');
        $article->vedioLink=$request->input('link');
        $article->save();
       return  redirect('workshop');
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
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        //
    }
    public function contact(Request $request)
    {
        $contact =new Contact();
        $contact->name=$request->input('name');
        $contact->subject=$request->input('subject');
        $contact->email=$request->input('email');
        $contact->message=$request->input('message');
        $contact->save();
        
        redirect('/');
    }

}
