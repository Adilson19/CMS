<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WebsiteController extends Controller
{
    //
    public function home()
    {
        $posts = Post::where('is_publish', Post::Published)->get();
        return view('website.blog.index', ['posts' => $posts]);
    }
}
