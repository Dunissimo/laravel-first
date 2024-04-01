<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
