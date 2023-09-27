<h2>Create Post</h2>
<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <label>
            Title
            <input name="title" type="text" value="{{ old('title') }}">
        </label>
        @error('title')
            <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>
            Content
            <textarea name="content">{{ old('content') }}</textarea>
        </label>
        @error('content')
            <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <hr>
    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button>Create</button>
</form>
