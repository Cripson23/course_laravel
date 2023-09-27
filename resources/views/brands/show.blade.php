<x-layout.main :title="'Бренд: ' . $brand->title">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="container mt-3 mb-2">
        <div class="col-md-8">
            <div class="row">
                <div class="col">Название:</div>
                <div class="col">{{ $brand->title }}</div>
            </div>
            <div class="row">
                <div class="col">Страна:</div>
                <div class="col">{{ $brand->country->name }}</div>
            </div>
            <div class="row">
                <div class="col">Описание:</div>
                <div class="col">{{ $brand->description }}</div>
            </div>
            <div class="row">
                <div class="col">Дата создания:</div>
                <div class="col">{{ $brand->created_at }}</div>
            </div>
        </div>
    </div>
    <div>
        <a class="btn btn-primary mt-3" href="{{ route('brands.index') }}">Назад</a>
    </div>
    <div class="mt-5">
        <x-form.comments entity_name="brand" :entity="$brand"/>
    </div>
</x-layout.main>
