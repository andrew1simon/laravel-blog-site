<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postes;

class postesCon extends Controller
{
    public static function Home () {
            return view('posts.hero' ,[
            'pageTitle'=>"All Postes",
            'posts'=> Postes::latest()->filter(request(['tag' , 'search']))->get()
            ]); 
        }
    public static function SinglePost($id) {
            return view('posts.post' , [
            'post'=> Postes::find($id)
            ]);
    }
    public static function EditPost($id) {
        return view('posts.edit' , [
        'post'=> Postes::find($id)
        ]);
}
    public static function NewPost() {
        return view('posts.new');
    }
    public static function AddPost(Request $req) {
        $form_content = $req->validate(
            [
               'title'=>'required',
               'content'=>'required',
                'tags' => 'nullable'
                
            ]);
            Postes::create($form_content);
            return redirect('/all-posts')->with("message" , "Post created successfully!");
    }
    public static function UpdatePost(Request $req , $id) {
        $post_edited = $req->validate(
            [
               'title'=>'required',
               'content'=>'required',
                'tags' => 'nullable'
                
            ]
            );
        Postes::where('id' , '=' , $id) -> update($post_edited);
        return redirect('/all-posts')->with("message" , "Post updated successfully!");
        
    }
    public static function PostEdit($id , Request $req) {
        $userId = auth()->user()->id;
        $post = postes::select("user_id")->where("id" , "=" , $id)->get();
        if($post[0]->user_id == $userId) {
           $post_edited = $req->validate(
            [
               'title'=>'required',
               'content'=>'required',
                'tags' => 'nullable'
                
            ]
            );
        Postes::where('id' , '=' , $id) -> update($post_edited);
        return redirect('/all-posts')->with("message" , "Post updated successfully!");
        
        }else {
            return abort('403' , "forbidden");
        };
    }

}
