<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
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
}
