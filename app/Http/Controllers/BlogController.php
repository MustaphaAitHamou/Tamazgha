<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('journalPosts.journal', compact('posts'));
    }

    public function create(){
        return view('journalPosts.create-post');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required'
        ]);


        $title = $request -> input('title');
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;
        $body = $request->input('body');

        //File upload
        $imagePath = 'storage/' . $request->file('image')->store('postsImages', 'public');

        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;

        $post->save();

        return redirect()->back()->with('status', 'Post Created Successfully');
    }

    public function show($slug){
        
      
        $post = Post::where('slug', $slug) -> first();
        return view('journalPosts.single-post', compact('post'));
    }
}
