<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index',
            'show'
        ]);
    }

    public function index()
    {
        $posts = Post::latest()->with('categories')->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
            'image' => ['required']
        ]);
        $categories = $request->input('categories');

        // Store Image
        $imagePath = $request->file('image')->store('public/posts');

        $post = Post::create([
            ...$credentials,
            'image_path' => str_replace('public/', '', $imagePath)
        ]);

        // Add Categories
        if (!empty($categories)) {
            $post->categories()->sync($categories);
        }

        return redirect()->route('posts.show', [
            'post' => $post->id
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $credentials = $request->validate([
            'title' => ['required', 'string'],
            'text' => ['required', 'string']
        ]);

        $post->update($credentials);

        return redirect()->route('posts.show', [
            'post' => $post->id
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
