@extends('layouts.main')
@section('content')
    <h1>Edit post</h1>

    <form action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <div class="w-50">
                <label for="post_title" class="form-label">Post title</label>
                <input type="text" name='title' class="form-control" id="post_title" placeholder="Enter title"
                       value="{{ $post->title }}" required>
            </div>
            <div class="w-50">
                <label for="post_likes" class="form-label">Post likes count</label>
                <input type="number" name="likes" class="form-control" id="post_likes" value="{{ $post->likes }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post content</label>
            <textarea class="form-control" name="content" id="post_content" rows="3" placeholder="Enter content"
                      required>{{$post->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
