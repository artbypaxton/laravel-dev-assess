<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index(Request $request): View
    {
        return view('dashboard', [
            'user' => $request->user(),
            'posts' => Post::orderByDesc('created_at')->limit(10)->get()
        ]);
    }
}
