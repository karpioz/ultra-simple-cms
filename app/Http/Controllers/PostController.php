<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller

{
    public function show(Post $post)
    {

        // dd($id);

        return view('post', ['post' => $post]);
    }
    
    public function create()
    {

        // dd($id);

        return view('admin.posts.create');
    }

    // storing the post
    public function store()
    {
        // dd(request()->all());

        // Form Validation
        $data = request()->validate([
            'post_title' => 'required',
            'post_body' => 'required',
            'post_image' => 'file'
        ]);

        if(request('post_image')) {
            $data['post_image'] = request('post_image')->store('uploads');
        }

        auth()->user()->post()->create($data);

        return back();
    }


 
}
