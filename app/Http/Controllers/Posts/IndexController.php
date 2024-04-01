<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(4);

        return view('posts.index', compact('posts'));
    }
}
