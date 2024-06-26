<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
