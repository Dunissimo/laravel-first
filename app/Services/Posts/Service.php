<?php

namespace App\Services\Posts;

use App\Models\Post;

class Service
{
    public function store($data)
    {
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
    }

    public function update(Post $post, $data)
    {
        if (array_key_exists('tags', $data)) {
            $tags = $data['tags'];
            unset($data['tags']);

            $post->tags()->sync($tags);
        }

        if ($data['category_id'] === '0') {
            $data['category_id'] = null;
        }

        $post->update($data);
    }
}
