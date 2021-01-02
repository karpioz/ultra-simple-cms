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

        // adding flash message
        session()->flash('message', 'New Post Added to the Database');
        session()->flash('class', 'success');

        // redirecting to show all posts page
        return redirect()->route('post.index');
    }


    // Show all posts by logged user in user panel
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }
   
   // Edit the post
    public function edit(Post $post)
    {
       return view('admin.posts.edit', ['post' => $post]);
    }

    //destroy post by id
    public function destroy(Post $post, Request $request)
    {
        $post->delete();

        $request->session()->flash('message', 'Post successfuly deleted');

        return back();
    }


 
}
