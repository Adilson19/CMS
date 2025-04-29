<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WebsiteController extends Controller
{
    //
    public function home()
    {
        $posts = Post::where('is_publish', Post::Published)->simplePaginate(1);
        return view('website.blog.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('website.blog.single',['post' => $post]);
    }
}
