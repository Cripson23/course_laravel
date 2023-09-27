@extends('layouts.main-extend')
@section('title', 'Редактирование автомобиля')
@section('h1', 'Редактирование автомобиля')

@section('content')
    <x-form action="{{ route('cars.update', [ $car->id ]) }}" method="put">
        @bind($car)
            @include('cars.form')
            <div class="mb-3">
                <x-form-select name="status" label="Статус" :options="\App\Enums\Cars\Status::options()" placeholder="Не выбран"></x-form-select>
            </div>
        @endbind
        <a class="btn btn-primary me-3" href="{{ route('cars.index') }}">Назад</a>
        <button class="btn btn-success">Сохранить</button>
    </x-form>
@stop

<!--<div class="updateCarForm">
    <form method="post" action="{{ route('cars.update', [$car->id]) }}">
        @method('PUT')
        @csrf
        <x-form.input label="Бренд" name="brand" type="text" :default-value="$car->brand" />
        <br>
        <x-form.input label="Модель" name="model" type="text" :default-value="$car->model" />
        <br>
        <x-form.input label="Стоимость" name="price" type="number" :default-value="$car->price" />
        <br>
        <x-form.select
            label="Тип кузова"
            name="body_type"
            id="body_type_select"
            :options="$bodyTypes"
            :selectedValue="old('body_type') ?? $car->body_type"
        />
        <br>
        <a class="btn btn-primary me-3" href="{{ route('cars.index') }}">Назад</a>
        <button class="btn btn-success">Сохранить</button>
    </form>
</div>-->
