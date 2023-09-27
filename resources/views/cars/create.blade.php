<x-layout.main title="Создание автомобиля">
    <div class="createCarForm">
        <x-form method="post" action="{{ route('cars.store') }}">
            @include('cars.form')
            <a class="btn btn-primary me-3" href="{{ route('cars.index') }}">Назад</a>
            <button class="btn btn-success">Сохранить</button>
        </x-form>
    </div>
</x-layout.main>
