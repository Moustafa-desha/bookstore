<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;
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
//guest
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function(){
    return "first route";
});
Route::get('/notauth',function(){
    return "you dont have permission to visit this page";
});
//users 
//register
Route::get('/users/register',[UserController::class,'register']);//form
Route::post('/users/handleregister',[UserController::class,'handleregister']);//handle
//login
Route::get('/users/login',[UserController::class,'login']);//form
Route::post('/users/handlelogin',[UserController::class,'handlelogin']);//handle



//user routes 
Route::middleware('isloggeduser')->group(function(){
    
//get all books
Route::get('/books',[BookController::class,'books']);  
Route::get('users/logout',[UserController::class,'logout']); 
Route::get('/users/notes',[NoteController::class,'notes']);
Route::post('/users/addnote',[NoteController::class,'addnote']);
//show 
Route::get('books/show/{id}',[BookController::class,'show']);     
});


Route::middleware('isadmin')->group(function(){
//create
Route::get('/books/create',[BookController::class,'create']);//form
Route::post('/books/store',[BookController::class,'store']);//handle

//update
Route::get('/books/edit/{id}',[BookController::class,'edit']);//form
Route::post('/books/update/{id}',[BookController::class,'update']);//handle
//delete
Route::get('books/delete/{id}',[BookController::class,'delete']);
    
//category
Route::get('/categories/list',[CategoryController::class,'list']);//form
Route::post('/categories/addcategory',[CategoryController::class,'addcategory']);//handel

});
