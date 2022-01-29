<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home',[
            "Article"=>Article::orderBy('created_at', 'DESC')->paginate(4)
        ]);
    }
    public function search(Request $request)
    {      $x=$request->input('t');
         $a=Article::orderBy('id', 'asc')->where('body','like','%'.$x.'%')->paginate(4);
        return view('home',[
            "Article"=>$a
        ]);
    }
    
    

    
}
