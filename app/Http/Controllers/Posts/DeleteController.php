<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
