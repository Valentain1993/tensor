<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentForm;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(3);

        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function show($id) {
        $post = Post::query()->findOrFail($id);

        return view('partial.posts.show',
            ['post'=>$post]);
    }

    public function comment($id, CommentForm $request) {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route('posts.show'));
    }

}
