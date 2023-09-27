<x-layout.main title="Добавление тэга">
    <div class="createTagForm">
        <x-form method="post" action="{{ route('tags.store') }}">
            @include('tags.form')
            <a class="btn btn-primary me-3" href="{{ route('tags.index') }}">Назад</a>
            <button class="btn btn-success">Сохранить</button>
        </x-form>
    </div>
</x-layout.main>
