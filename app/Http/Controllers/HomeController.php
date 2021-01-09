<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Post; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // display all post
        //$posts = Post::all();

        // display 5 post starting from latest
        $posts = Post::latest()->paginate(5);

        return view('home', ['posts' => $posts]);
    }
}
