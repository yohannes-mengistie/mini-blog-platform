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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
