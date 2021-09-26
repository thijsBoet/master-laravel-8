@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
	@csrf
	@include('posts.partials.form')
	<div><input type="submit" value="Create"></div>
</form>
@endsection