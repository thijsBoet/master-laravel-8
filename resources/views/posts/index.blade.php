@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<h1>Posts</h1>
    {{--  @each('posts.partials.post', $posts, 'post')  --}}
    @forelse ($posts as $key => $post)
        @include('posts.partials.post')
    @empty
        <div>No Posts Found!</div>
    @endforelse
@endsection
