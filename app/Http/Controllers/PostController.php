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
        $postsArr = [
            [
                'title' => 'created',
                'content' => 'created',
                'image' => '1',
                'likes' => 1,
                'is_published' => 1,
            ],
            [
                'title' => 'another created',
                'content' => 'another created',
                'image' => '123',
                'likes' => 2,
                'is_published' => 0,
            ],
        ];

//        foreach ($postsArr as $item) {
//            Post::create($item);
//        }

        return view('posts.create');
    }

    public function update()
    {
        $post = Post::find(1);

//        $post->update([
//            'title' => 'updated',
//            'content' => 'updated',
//            'image' => 'updated',
//            'likes' => 0,
//            'is_published' => 0,
//        ]);

        return view('posts.update');
    }

    public function delete()
    {
        $post = Post::find(1);
//        $post->delete();

        return view('posts.delete');
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
