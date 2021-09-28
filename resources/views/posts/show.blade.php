@extends('layouts.app')

@section('title', $post->title)

@section('content')

{{-- @if($post['is_new'])
	<div>A new Blogpost using if</div>
@else
	<div>Blog post is old using elseif/else</div>
@endif

@unless ($post['is_new'])
	<div>It is an old post... using unless</div>
@endunless

@isset($post['has_comments'])
	<div>The post has some comments ... using isset</div>
@endisset --}}

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p>Added {{ $post->created_at->diffForHumans() }}</p>

@if(now()->diffInMinutes($post->created_at) <= 5) 
	<div class="alert alert-info" role="alert">
		New!
	</div>
@endif
	{{-- <a class="btn btn-primary" href="{{ back() }}"><- Back</a> --}}
@endsection