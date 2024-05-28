<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return view('home.index', ['posts' => $posts]);
    }
}
