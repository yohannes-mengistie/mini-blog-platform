<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::with('user')->latest()->get();
        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function show(Blog $blog) {
        return view('blogs.show', ['blog' => $blog]);
    }

    public function create() {
        return view('blogs.create');
    }

    public function store() {
        request()->validate([
        'blog_title' => ['required'],
        'blog_content' => ['required']
        ]);

        Blog::create([
            'blog_title' => request('blog_title'),
            'blog_content' => request('blog_contect'),
            'user_id' => 1
        ]);

        return redirect('/blogs');
    }

    public function edit(Blog $blog) {
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Blog $blog) {
        request()->validate([
            'blog_title' => ['required'],
            'blog_content' => ['required']
        ]);

        $blog->update([
            'blog_title' => request('blog_title'),
            'blog_content' => request('blog_content')
        ]);

        return redirect('/blogs/'. $blog->id);
    }

    public function destroy(Blog $blog) {
        $blog -> delete();

        return redirect('/blogs');
    }
}
