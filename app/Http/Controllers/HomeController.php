<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user(); // Get the currently authenticated user
        if ($user->role === 'admin') {
            $posts = Post::all(); // Admin can see all posts
        }  elseif ($user && $user->role === 'author') {
            // Authors can only see their posts
            $posts = Post::where('user_id', $user->id)->get();
        } else {
            // Regular users see published posts
            $posts = Post::where('is_published', true)->get();
        }

        return view('home', compact('posts'));
       
    }
}
