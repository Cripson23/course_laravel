<x-layout.main title="Добавление страны">
    <div class="createCountryForm">
        <x-form method="post" action="{{ route('countries.store') }}">
            @include('countries.form')
            <a class="btn btn-primary me-3" href="{{ route('countries.index') }}">Назад</a>
            <button class="btn btn-success">Сохранить</button>
        </x-form>
    </div>
</x-layout.main>
