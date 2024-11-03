@extends('layouts.selecao')

@section('title', 'index')

@section('content')
<form action="/post-search-index" method="GET">
    @csrf
    <div class="input-group col-12 mt-2">
        <input type="text" name="search" class="form-control search-bar" id="search-bar" placeholder="Search">
        <div class="input-group-append">
            <button name="ok" class="btn btn-primary form-control btn-search">Search</button>
        </div>
    </div>
</form>
@foreach ($posts->chunk(4) as $chunk)
    <div class="row">
        @foreach ($chunk as $post)
            @if ($post->categories->is_active == 1)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card mt-1" style="width: 18rem;">
                        <img src="{{asset($post->image)}}" width="100px" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text truncate-cell">{{$post->description}}</p>
                            <a href="/batafsil/{{$post->id}}" class="btn btn-primary">Batafsil</a>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach
    </div>
@endforeach

{{$posts->links()}}

@endsection