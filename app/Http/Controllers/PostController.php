<?php

namespace App\Http\Controllers;

use App\Models\{ Post, User };
use Illuminate\Http\{ RedirectResponse, Request };
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a user's posts.
     */
    public function user(User $user, Request $request): View
    {
        return view('posts.user', [
            'user' => $user,
            'posts' => $user->posts
        ]);
    }

    /**
     * Display the new blog form.
     */
    public function new(Request $request): View
    {
        return view('posts.new', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Creates a new post entry.
     */
    public function create(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_url' => 'nullable',
            'content' => 'required|max:2000'
        ]);

        $imageUploadResult = null;

        if (!empty($request->img_url)) {
            $imageUploadResult = $request->file('img_url')->store('images');
        }

        $post = Post::create([
            'title' => $request->title,
            'img_url' => $imageUploadResult,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'content' => $request->content
        ]);

        return redirect(route('posts.show', ['post' => $post->id]))->with('success', 'Post has been successfully created.');
    }

    /**
     * Updates a post entry.
     */
    public function update(Post $post, Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_url' => 'nullable',
            'content' => 'required|max:2000'
        ]);

        $imageUploadResult = null;

        if (!empty($request->img_url)) {
            $imageUploadResult = $request->file('img_url')->store('images');
        }

        $post->title = $request->title;
        $post->img_url = $imageUploadResult ?? $post->img_url ?? null;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();

        return redirect(route('posts.show', ['post' => $post->id]))->with('success', 'Post has been successfully updated.');
    }

    /**
     * Display an individual post.
     */
    public function show(Post $post, Request $request): View
    {
        return view('posts.show', [
            'user' => $request->user(),
            'post' => $post
        ]);
    }

    /**
     * Display an individual post edit page.
     */
    public function edit(Post $post, Request $request): View
    {
        return view('posts.edit', [
            'user' => $request->user(),
            'post' => $post
        ]);
    }
}
