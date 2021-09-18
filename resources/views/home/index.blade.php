@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
	<h1>Home Page</h1>

	<div>
		@for ($i =1; $i <=10; $i++)
			<div>The current value is {{ $i }}</div>
		@endfor
	</div>

	<div>
		@php $done = false @endphp
		@while(!$done)
			<div>I'm not done</div>
			@php
				if(random_int(0,5) === 1) $done = true
			@endphp
		@endwhile
	</div>
@endsection