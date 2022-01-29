<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function delete($id)
    {
       
            $user=User::find($id);
           if($user->isAdmin){
               $user->isAdmin=0;
           }else{
               $user->isAdmin=1;
           }
          
           $user->save();
           $user=User::paginate(10);
           //$messages=Contact::all();
           //$messages=Contact::paginate(10);
       return redirect('/dashboard');
       
    }
    public function remove($id)
    {
       
            $user=User::find($id);
          
           $user->delete();
           $user=User::paginate(10);
           //$messages=Contact::all();
           //$messages=Contact::paginate(10);
       return redirect('/dashboard');
       
    }

}
