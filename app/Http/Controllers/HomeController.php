<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Writer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    public function showpost()
    {

         
            $posts = DB::table('posts')->where('upload','=',1)->get();
            return view('userDoList.viewposts')->with('posts',$posts);
        
        
    }



    public function spost($id)
    {
        
          $posts = DB::table('posts')->where('id','=',$id)->get();
           
        return view('userDoList.viewpost')->with('posts',$posts);
    }


    
    public function showcomments(Request $request)
    { 
        $comments = DB::table('commnets')->where('post','=',$request->post_id)->get();//pernei to id tou post gia na emfanisi ta katalila comments
        return view('showcomments')->with('commnets',$comments);
    }

       

    //prepei na steilw kai to id tou user
    public function addcomment(Request $request)// stelnw ta stoixeia tou comment mazi me to id tou post
    {
        if(Auth::guard('web')->check())
        {
            $user_id= $request->user_id;           
            $post_id = $request->post_id;//perimenw na mou stelnei to post id 
            
            $comment = new Comment();
            $comment->body = $request->body;

            $comment->users = $user_id;
            $comment->posts = $post_id;

            $comment->save();
            
            return redirect()->back();

        }

        return redirect()->back();

    }

}
