@extends('layouts.main')
@section('content')
    <div class="row align-items-md-stretch">
        <a class="mb-4" href="{{ route('posts.index') }}">Back...</a>

        <div class="mb-5">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <div>
                    <h2>
                        {{$post->title}}
                    </h2>
                    <p>{{$post->content}}</p>


                    <hr>

                    <span>Like's count: {{$post->likes}}</span>
                    <br>
                    <span>Is published: {{$post->is_published}}</span>
                    <br>

                    <div class="px-2 row flex-nowrap mt-4">
                        <a class="w-auto btn btn-secondary" href="{{ route('posts.edit', $post->id) }}">Edit post</a>

                        <form class="w-auto" action="{{ route('posts.delete', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
