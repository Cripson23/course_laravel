<x-layout.main :title="'Car: ' . $car->brand->title . ' ' . $car->model">
    <x-alert.simple-alert></x-alert.simple-alert>
    <div class="container mt-3 mb-2">
        <div class="col-md-4">
            <div class="row">
                <div class="col">Бренд:</div>
                <div class="col">{{ $car->brand->title }}</div>
            </div>
            <div class="row">
                <div class="col">Модель:</div>
                <div class="col">{{ $car->model }}</div>
            </div>
            <div class="row">
                <div class="col">Стоимость:</div>
                <div class="col">{{ $car->price }}</div>
            </div>
            <div class="row">
                <div class="col">Тип кузова:</div>
                <div class="col">{{ $bodyTypes[$car->body_type] }}</div>
            </div>
            <div class="row">
                <div class="col">Vin:</div>
                <div class="col">{{ $car->vin }}</div>
            </div>
            <div class="row">
                <div class="col">Дата создания:</div>
                <div class="col">{{ $car->created_at }}</div>
            </div>
            <div class="row">
                <div class="col">Статус:</div>
                <div class="col">{{ $car->status->text() }}</div>
            </div>
        </div>
    </div>
    <div>
        <a class="btn btn-primary mt-3" href="{{ route('cars.index') }}">Назад</a>
    </div>
    <div class="mt-5">
        <x-form.comments entity_name='car' :entity="$car"/>
    </div>
</x-layout.main>
