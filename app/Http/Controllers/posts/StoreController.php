<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke()
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
}
