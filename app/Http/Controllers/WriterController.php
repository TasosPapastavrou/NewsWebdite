<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Writer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WriterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:writer');
    }

    public function index()
    {
        return view('writer');
    }

   
    public function addpost(Request $request,$id) 
    {
        if(Auth::guard('writer')->check())
        {                      
            $this->validate($request,[
                'title' => 'required',
                'body' => 'required',
                'img' => 'required',
            ]);
            
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->img = $request->img;
            $post->upload = 0; 
            $post->writers = $id;           
            $post->save();
           
            return view('writer');
        }
        
        return redirect()->back();

    }

   
    public function showaAllPosts()
    {       
        $posts = Post::all();     

        if(Auth::guard('writer')->check())
        {
             return view('writerDoList.allposts')->with('posts',$posts);
             
        }        
    }

    public function selectPost($id)
    { 
        if(Auth::guard('writer')->check())
        {
        $post = Post::find($id);

        return view('writerDoList.editp')->with('post',$post);
    }

    }
     
     public function postEdit(Request $request,$id)
    {
        if(Auth::guard('writer')->check())
        {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->img = $request->img;
        $post->save();    

        return view('writer');
    }
    }
     

}
