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
                       value="{{ $post->title }}">

                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="w-50">
                <label for="post_likes" class="form-label">Post likes count</label>
                <input type="number" name="likes" class="form-control" id="post_likes" value="{{ $post->likes }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post content</label>
            <textarea class="form-control"
                      name="content"
                      id="post_content"
                      rows="3"
                      placeholder="Enter content"
            >
                {{$post->content}}
            </textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <select class="form-select mb-3" aria-label="Default select example" name="category_id">
            <option selected value="0">None</option>
            @foreach($categories as $category)
                <option
                        {{$category->id === ($post->category ? $post->category->id : null) ? "selected" : ""}}
                        value="{{$category->id}}"
                >
                    {{$category->title}}
                </option>
            @endforeach
        </select>

        <select multiple class="form-select mb-3" aria-label="Default select example" name="tags[]">
            @foreach($tags as $tag)
                <option
                        {{ $post->tags->contains('id', $tag->id) ? 'selected' : '' }}
                        value="{{$tag->id}}"
                >
                    {{$tag->title}}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
