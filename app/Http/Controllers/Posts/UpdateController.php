<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Posts\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route('posts.show', $post->id);
    }
}
