<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'likes' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        if ($data['category_id'] === '0') {
            unset($data['category_id']);
        }

        if (array_key_exists('tags', $data)) {
            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);

            $post->tags()->attach($tags);
        } else {
            Post::create($data);
        }

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'likes' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        if (array_key_exists('tags', $data)) {
            $tags = $data['tags'];
            unset($data['tags']);

            $post->tags()->sync($tags);
        }

        if ($data['category_id'] === '0') {
            $data['category_id'] = null;
        }

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
        $another = ['title' => 'another created', 'content' => 'some post', 'image' => '123', 'likes' => 2, 'is_published' => 0,];

        $post = Post::firstOrCreate(['title' => 'some'], ['title' => 'some', 'content' => 'some post', 'image' => '123', 'likes' => 2, 'is_published' => 0,]);

        dump($post->content);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(['title' => 'some 2'], ['title' => 'some 2', 'content' => 'some post', 'image' => '123', 'likes' => 2, 'is_published' => 0,]);

        dump($post->content);
    }
}
