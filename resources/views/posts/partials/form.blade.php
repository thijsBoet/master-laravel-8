<div><input type="text" name="title" placeholder="Title*" value="{{ old('title', optional($post ?? null)->title) }}"></div>
	@error('title')
		<div class="error">{{ $message }}</div><br>
	@enderror
	<div><textarea name="content" placeholder="Content*">{{ old('content', optional($post ?? null)->content) }}</textarea></div>
	@error('content')
		<div class="error">{{ $message }}</div><br>
	@enderror
	@if ($errors->any())
		<div>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif