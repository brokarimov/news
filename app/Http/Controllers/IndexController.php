<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LikeOrDislike;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('tr', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        
        return view('pages.index', ['models' => $categories, 'posts' => $posts]);
    }

    public function batafsil(Post $post)
    {
        $categories = Category::orderBy('tr', 'asc')->get();
        $posts = Post::orderBy('id', 'asc')->get();
        $likeordislike = LikeOrDislike::where('user_id', auth()->user()->id)->where( 'post_id', $post->id )->first();
        return view('pages.batafsil', ['models' => $categories, 'post' => $post,'likeordislike'=>$likeordislike]);

    }
    public function search(Request $request)
    {
        $categories = Category::orderBy('tr', 'asc')->get();

        $posts = Post::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate(5);

        return view('pages.index', ['posts' => $posts, 'models' => $categories]);
    }
}
