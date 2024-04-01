<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Posts\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('posts.index');
    }
}
