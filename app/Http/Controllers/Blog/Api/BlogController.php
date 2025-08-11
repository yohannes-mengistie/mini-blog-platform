<?php

namespace App\Http\Controllers\Blog\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $blogs = Blog::with('user')->latest()->get();
            // dd($blogs);
            return response()->json([
                'success' => true,
                'data'=>$blogs,
                'message'=> 'Blogs are retrived successfully',
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Blog retrival failed'
            ],500);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        return response()->json([
            'success'=>true,
            'message'=>'successfuly posted your blog'
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json(['data'=> $blog->blog_content],200);
    }


    public function edit(Blog $blog){
        return response()->json([
            'success'=>true,
            'data' => $blog,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Blog $blog)
    {
        try{
            request()->validate([
            'blog_title' => ['required'],
            'blog_content' => ['required']
        ]);

        $blog->update([
            'blog_title' => request('blog_title'),
            'blog_content' => request('blog_content')
        ]);

        return response()->json([
            'success'=>true,
            'data'=>$blog->blog_content,
            'message'=> 'successfully update your blog'
        ]);
        }catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'message'=>'unable to update'.$e
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog -> delete();
        return response()->json([
            'success'=>true,
            'message'=>'successfully deleted from the database'
        ],204);
    }
}
