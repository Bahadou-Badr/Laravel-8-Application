<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index');
    }

    public function store(Request $request) {
        //Validation
        $this->validate($request, [
            'body' => 'required'
        ]);
        //Insertion
        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);
        //OR
        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }
}
