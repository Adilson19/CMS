<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class WebsiteController extends Controller
{
    //
    public function home()
    {
        $latestPosts = Post::orderBy('id', 'desc')->get();
        $categories = Category::take(5)->get();
        $posts = Post::where('is_publish', Post::Published)->simplePaginate(1);
        return view('website.blog.index', [
            'posts' => $posts, 
            'latestPost' => $latestPosts, 
            'categories' => $categories]);  
    }

    public function show(Post $post)
    {
        return view('website.blog.single',['post' => $post]);
    }
}
