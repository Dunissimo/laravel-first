@extends('layouts.main')
@section('content')
    <h1>Create post</h1>

    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="w-50">
                <label for="post_title" class="form-label">Post title</label>
                <input value="{{old('title')}}" type="text" name='title' class="form-control" id="post_title"
                       placeholder="Enter title">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="w-50">
                <label for="post_likes" class="form-label">Post likes count</label>
                <input value="{{old('likes')}}" type="number" name="likes" class="form-control" id="post_likes">
            </div>
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post content</label>
            <textarea class="form-control" name="content" id="post_content" rows="3"
                      placeholder="Enter content"
            >{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <select class="form-select mb-3" aria-label="Default select example" name="category_id">
            @foreach($categories as $category)
                <option
                    {{old('category_id') == $category->id ? "selected" : ''}} value="{{$category->id}}"
                >
                    {{$category->title}}
                </option>
            @endforeach
        </select>

        <select multiple class="form-select mb-3" aria-label="Default select example" name="tags[]">
            @foreach($tags as $tag)
                <option
                    {{old('tags') != null && in_array($tag->id, old('tags')) ? 'selected' : ''}} value="{{$tag->id}}"
                >
                    {{$tag->title}}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
