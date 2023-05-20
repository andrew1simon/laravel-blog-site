<?php

namespace App\Http\Controllers;

use App\Models\postes;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class usersCon extends Controller
{
    public static function RegPage() {
        return view('user.register');
    }
    public static function AddUser(Request $req) {
        $form_content = $req->validate([
            'name' => ['required','min:3'],
            'email'=>['required', Rule::unique('users', 'email') , 'email'], 
            'password' => ['required' , 'confirmed' , 'min:6']
        ]);
        $form_content['password'] = Hash::make($form_content['password']);
        user::create($form_content);
        return redirect('/all-posts')->with("message" , "welcome , you had reg sussfully");
    }
    public static function LoginPage() {
        return view('user.login');
    }
    public static function Auth(Request $req) {
       // dd($req);
        $form_content = $req->validate([
            'email'=>['required', 'email'], 
            'password' => ['required']
        ]);
        if (Auth::attempt($form_content)) {
            $req->session()->regenerate();
            return redirect()->intended('/all-posts')->with('message', 'You are now logged in.');
        }else {
            return back()->withErrors(['email'=>'Email/Password is incorrect'])->onlyInput('email');
        }
    }
    public static function Logout(Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/all-posts')->with("message" , "You are logged out sussfully");
    }

    public static function UserPosts(Request $req) {
        $userId = auth()->user()->id;
        $userPosts = postes::select("title" , "tags" , "content" , "img" , "id")->where('user_id' , '=' , $userId) ->get();
        return view('user.posts', [
            'posts'=> $userPosts
        ]);
    }
    public static function DeletePost (Request $req) {
        $userId = auth()->user()->id;
        $postId = $req['delete-id'];
        $post = postes::select("user_id")->where("id" , "=" , $postId)->get();
        if($post[0]->user_id == $userId) {
           postes::where("id" , "=" , $postId)->delete();
           return redirect('/user/posts')->with('message' , "the post was deleted sussfully");
        }else {
            return "false";
        };
        
    }
    
    public static function GetPostEdit($id) {
        $userId = auth()->user()->id;
        $post = postes::select("user_id")->where("id" , "=" , $id)->get();
        if($post[0]->user_id == $userId) {
           $postData = postes::select("id" , "img" , "title" , "content" , "tags")->where("id" , "=" , $id)->get();
           return $postData;
        }else {
            return abort('403' , "forbidden");
        };
    }
}
