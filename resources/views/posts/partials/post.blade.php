{{-- @if ($loop->even) --}}
    <h3>
        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-light">
            {{ $post->title }}
        </a>
    </h3>
{{-- @else
    <div style="background-color: silver">{{ $key }}. {{ $post->title }}</div>
@endif --}}

<div class="mb-3">
    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>
    <form class="d-inline " action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        
        <input class="btn btn-danger" type="submit" value="Delete!">
    </form>
</div>