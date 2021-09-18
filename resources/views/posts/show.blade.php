@extends('layouts.app')

@section('title', $post['title'])

@section('content')

@if($post['is_new'])
	<div>A new Blogpost using if</div>
@else
	<div>Blog post is old using elseif/else</div>
@endif

@unless ($post['is_new'])
	<div>It is an old post... using unless</div>
@endunless

@isset($post['has_comments'])
	<div>The post has some comments ... using isset</div>
@endisset


	<h1>{{ $post['title'] }}</h1>
	<p>{{ $post['content'] }}</p>
@endsection