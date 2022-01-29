<?php

use App\Contact;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/searchWorkshop', 'FormationController@search')->name('searchWorkshop');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/contact', 'FormationController@contact')->name('contact');
//Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/dashboard', function(){
    $user=User::paginate(10);
    //$messages=Contact::all();
    //$messages=Contact::paginate(10);
return view('dashboard',[
    "users"=>$user,
    
]);
})->name('dashboard');
Route::get('/delete/{id}','DashboardController@delete')->name('Admin');
Route::get('/remove/{id}','DashboardController@remove')->name('removeUser');
Route::get('/dashboard2', function(){
    $messages=Contact::paginate(10);
    

return view('dashboard',[
    "messages"=>$messages
]);
})->name('dashboard2');

Route::get('/workshop', 'FormationController@index')->name('workshop');
Route::post('/create', 'ArticleController@create')->name('createArticle');
Route::post('/create2', 'FormationController@create')->name('createWorkshop');
Route::get('/{id}', 'ArticleController@index')->name('show');
Route::get('/addComment/{id}', 'CommentController@create')->name('addComment');

//Route::get('/Dashboard', 'FormationController@dashboard')->name('dashboard');
