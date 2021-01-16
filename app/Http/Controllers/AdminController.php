<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Writer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin');
    }

    public function listforuploadposts(){
         
        
        $posts = DB::table('posts')->where('upload','=',0)->get();
     

        if(Auth::guard('admin')->check())
        {
             return view('adminDoList.allpostsforupload')->with('posts',$posts);
             
        }
        
    }


       
      public function postupload($id) 
      {        
         $post = Post::find($id);
          $post->upload = 1;
          $post->save();

          $posts = DB::table('posts')->where('upload','=',0)->get();
     

        if(Auth::guard('admin')->check())
        {
             return view('adminDoList.allpostsforupload')->with('posts',$posts);
             
        }
          
       
      }
 
}
