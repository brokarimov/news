@extends('layouts.selecao')

@section('title', 'Batafsil')

@section('content')
<div class="row">
    <div class="col-8">
        <img src="{{ asset($post->image) }}" class="center" alt="">
        <h1 class="center">{{ $post->title }}</h1>
        <h5 class="center">{{ $post->description }}</h5>
        <p class="center">{{ $post->text }}</p>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-outline-primary me-2">{{ $post->like }} <i class="bi bi-hand-thumbs-up"></i></a>
            <a href="#" class="btn btn-outline-primary">{{ $post->dislike }} <i class="bi bi-hand-thumbs-down"></i></a>
        </div>
    </div>

    <div class="col-4">
        <h1>Comments</h1>
        @if (isset($post->comments))
            <ul>
                @foreach($post->comments as $comment)
                    <li>
                        <h5>{{ $comment->users->name }}</h5>
                        <p>{{ $comment->text }}</p>
                    </li>
                @endforeach
            </ul>
            @if (auth()->check())
                <form action="/createComment" method="POST">
                    @csrf
                    <div class="input-group col-12 mt-2">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="text" class="form-control" name="text" placeholder="Enter Comment">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            @endif

        @endif
    </div>
</div>
@endsection