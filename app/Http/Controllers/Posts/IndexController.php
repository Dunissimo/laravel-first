<?php

namespace App\Http\Controllers\Posts;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Posts\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $query = Post::query();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(4);

        return view('posts.index', compact('posts'));
    }
}
