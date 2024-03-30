<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'likes' => 'string',
        ]);

        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'likes' => 'string',
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function firstOrCreate()
    {
        $another = [
            'title' => 'another created',
            'content' => 'some post',
            'image' => '123',
            'likes' => 2,
            'is_published' => 0,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some'
        ], [
            'title' => 'some',
            'content' => 'some post',
            'image' => '123',
            'likes' => 2,
            'is_published' => 0,
        ]);

        dump($post->content);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'some 2'
        ], [
            'title' => 'some 2',
            'content' => 'some post',
            'image' => '123',
            'likes' => 2,
            'is_published' => 0,
        ]);

        dump($post->content);
    }
}
