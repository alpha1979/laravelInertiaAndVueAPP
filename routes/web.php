<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
   
    $messages = Message::all();
    return view('about', ['messages' => $messages]);
});

// Laravel Inertia js way
Route::get('/hello', function (){
    return Inertia::render('Hello');
});

Route::get('/contact', function (){
    $messages = Message::all();
    return inertia('Contact',['messages'=>$messages]);
});

Route::post('/messages',function(Request $request){
    $validated = $request->validate([
        'text' =>'required|min:8'
    ]);
    Message::create($validated);
    return redirect('/contact');
});