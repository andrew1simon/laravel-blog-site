<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Postes;
use App\Http\Controllers\postesCon;
use App\Http\Controllers\usersCon;

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

Route::get('/all-posts' , [postesCon::class, 'Home']);

Route::get('/post/new' , [postesCon::class , 'NewPost']);

Route::get('/post/{id}' , [postesCon::class , 'SinglePost']);

Route::get('/post/{id}/edit' , [postesCon::class , 'EditPost']);

Route::put("/post/{id}/edit" , [postesCon::class , 'UpdatePost']);

Route::post('/post/new' , [postesCon::class , 'AddPost']);

//

Route::get('/user/new' , [usersCon::class, 'RegPage']);

Route::get('/user/login' , [usersCon::class , 'LoginPage']);

Route::post('/user/login' , [usersCon::class , 'Auth']);

Route::post('/user/new' , [usersCon::class, 'AddUser']);

Route::post("/user/logout" , [usersCon::class , 'Logout']);

Route::get("/user/posts" , [usersCon::class , "UserPosts"]);

Route::get('/test' , function () {
    return view('user.testing');
});

Route::post('/user/post/delete' , [usersCon::class , "DeletePost"]);
Route::get('/user/post/edit/{id}' ,[usersCon::class , 'GetPostEdit']);
Route::post('/user/post/edit/{id}' ,[postesCon::class , 'PostEdit']);

