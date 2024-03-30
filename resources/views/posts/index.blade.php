@extends('layouts.main')
@section('content')
    <div class="row align-items-md-stretch">
        @foreach($posts as $post)
            <div class="col-md-6 mb-5">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <div>
                        <h2>
                            <a href="{{ route('posts.show', $post->id) }}">
                                {{$post->title}}
                            </a>
                        </h2>
                        <p>{{$post->content}}</p>
                    </div>
                </div>
            </div>
        @endforeach
            </div>
        <br>
@endsection
