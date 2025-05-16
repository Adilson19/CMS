<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $userCount = User::count();
        return view('auth.dashboard', compact('postsCount', 'categoriesCount', 'userCount'));
    }
}
