<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// this how to make an api with json data

Route::get('/get-post' , function(){
    return Response()->json([
        "Posts"=> [
            "title"=>"frist laravel api" , 
            "dis"=>"this is how to do it"
        ]
           
        ]);
});