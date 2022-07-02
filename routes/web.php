<?php

use App\Mail\PostUpdate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('contact-form', 'MessageController@index')->name('contact-form.index');
Route::post('contact-form', 'MessageController@store');

// controller per gestire la richiesta ()

// un modello per  il messaggio ricevuto

// tabella messages

// mailable per admin

// mailable per utente

// limitare accesso a pannello messaggi solo al primo utente (il nostro supe admin)

Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    // admin dashboard
    Route::get('/', 'HomeController@index')->name('dashboard');
    // admin posts
    Route::resource('posts', 'PostController')->parameters([
        'posts' => 'post:slug'
    ]);
    // admin categories
    Route::resource('categories', 'CategoryController')->parameters([
        'categories' => 'category:slug'
    ])->except('show', 'edit', 'create');
    // admin tags
    Route::resource('tags', 'TagController')->parameters([
        'tags' => 'tag:slug'
    ])->except('show', 'edit', 'create');

    Route::resource('messages', 'Admin\MessageController');
});




Route::get("{any?}", function (){
    return view("guest.home");
})->where("any", ".*");
