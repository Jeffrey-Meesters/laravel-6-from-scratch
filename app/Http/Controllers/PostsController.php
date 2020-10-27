<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Post;

class PostsController extends Controller
{

    public function show($slug) {
        // $posts = [
        //     "first" => "Hi first",
        //     "second" => "Hi second"
        // ];

        // $post = DB::table('posts')->where('slug', $slug)->first();

        // if (!array_key_exists($post, $posts)) {
        //     abort(404, "Sorry that post was not found");
        // };

        // if (!$post) {
        //     abort(404, "Sorry that post was not found");
        // };

        $post = Post::where('slug', $slug)->firstOrFail();

        return view("post", [
            'post' => $post
        ]);        
    }
}
