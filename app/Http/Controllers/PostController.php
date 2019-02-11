<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    //get index table of posts i.e. list of posts
    public function getIndex() {
        $posts = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.author')->paginate(2);
        $archives = DB::table('posts')->orderBy('id', 'DESC')->get();

        $data = array(
            'posts' => $posts,
            'archives' => $archives
        );
        return view('post/index', $data);
    }

    //get post from id
    public function getFullPost($post_id) {
        $post = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.author')->where('posts.id', '=', $post_id)->first();
        return view('post.read', ['post' => $post]);
    }

    public function addComment($post_id) {
        $post = Post::find($post_id);
        $author = $post->get('author');
        Post::create(array(
            'post' => $post_id,
            'description' => Input::get('desc_comment'),
            'author' => $author
        ));
        //return view('post.post_detail', ['post' => $post]);
        return redirect()->route('post.detail', ['id'=>$post_id])->with('success','Comment added!');
    }
}
