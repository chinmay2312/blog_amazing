<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('users')->leftjoin('posts','users.id', '=', 'posts.author')->paginate(10);
        return view('home', ['posts' => $posts]);
    }

    public function getPostForm()   {
        return view('post.post_form');
    }

    public function createPost(Request $request) {
        $newPost = Post::create(array(
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'author' => Auth::user()->id
        ));
        return redirect()->route('home')->with('success', 'Your post\'s added ! ');
    }

    public function getPost($id) {
        $post = Post::find($id);
        $comments = DB::table('comments')->paginate(10);
        return view('post.post_detail', ['post' => $post])->with('comments',$comments);
    }
}
