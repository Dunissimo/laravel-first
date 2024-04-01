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

                        <div>
                            @if(isset($post->category))
                                <p>Category:
                                    <span class="bg-info py-1 px-2 rounded-2">
                                        {{$post->category->title}}
                                    </span>
                                </p>
                            @endif

                            @if($post->tags->isNotEmpty())
                                <p>Tags:
                                    @foreach($post->tags as $tag)
                                        <span class="bg-success py-1 px-2 rounded-2">{{$tag->title}}</span>
                                    @endforeach
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
    <br>
@endsection
