@props([
	'entity',
	'entity_name',
])

<div class="section-comments">
    @if ($entity->comments->isNotEmpty())
        <h3>Комментарии</h3>
        <div class="section-comments-list">
            @foreach($entity->comments as $comment)
                <div class="col-md-12">
                    <div class="card border-light mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3 fs-5">
                                    @ {{ $comment->author_name }}
                                </div>
                                <div class="col-md-2 offset-md-7">
                                    {{ $comment->created_at->format('d.m.Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $comment->text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div class="mt-5">
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <h4>Оставьте ваш комментарий</h4>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            @method('POST')
            <input hidden type="text" name="commentable_type" value="{{ $entity_name }}">
            <input hidden type="text" name="commentable_id" value="{{ $entity->id }}">
            <div class="mb-3">
                <label for="authorName" class="form-label">Ваше имя</label>
                <x-form-input type="text" name="author_name" id="authorName" aria-describedby="authorName" />
                <div id="authorNameHelp" class="form-text">Введите ваше имя для отображения рядом с комментарием</div>
            </div>
            <div class="mb-3">
                <label for="commentText" class="form-label">Текст комментария</label>
                <x-form-textarea rows="6" name="text" id="commentText"></x-form-textarea>
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
</div>
