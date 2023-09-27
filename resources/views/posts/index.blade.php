<h2>Posts</h2>
<a href="{{ route('posts.create') }}">Create Post</a>
<ul>
    @foreach($posts as $post)
        <li>
            <div class="title">
                @can('view', $post)
                    <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                @else
                    <h3>{{ $post->title }}</h3>
                @endif
            </div>
            <div class="content">
                <p>{{ $post->content }}</p>
            </div>

        </li>
    @endforeach
</ul>

