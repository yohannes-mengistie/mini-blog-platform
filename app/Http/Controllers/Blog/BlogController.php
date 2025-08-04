<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $request) {
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
        'blog_description' => ['required', 'max:200'],
        'blog_content' => ['required']
        ]);

        Blog::create([
            'blog_title' => request('blog_title'),
            'blog_description' => request('blog_description'),
            'blog_content' => request('blog_content'),
            'user_id' => auth()->id()
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
