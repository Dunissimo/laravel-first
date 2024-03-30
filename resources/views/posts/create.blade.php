@extends('layouts.main')
@section('content')
<h1>Create post</h1>

<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="w-50">
            <label for="post_title" class="form-label">Post title</label>
            <input type="text" name='title' class="form-control" id="post_title" placeholder="Enter title" required>
        </div>
        <div class="w-50">
            <label for="post_likes" class="form-label">Post likes count</label>
            <input type="number" name="likes" class="form-control" id="post_likes" value="1">
        </div>
    </div>
    <div class="mb-3">
        <label for="post_content" class="form-label">Post content</label>
        <textarea class="form-control" name="content" id="post_content" rows="3" placeholder="Enter content" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
