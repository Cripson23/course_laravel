<x-layout.main title="Создание бренда">
    <div class="createBrandForm">
        <x-form method="post" action="{{ route('brands.store') }}">
            @include('brands.form')
            <a class="btn btn-primary me-3" href="{{ route('brands.index') }}">Назад</a>
            <button class="btn btn-success">Сохранить</button>
        </x-form>
    </div>
</x-layout.main>
