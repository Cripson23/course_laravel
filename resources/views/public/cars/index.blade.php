@extends('layouts.guest')
@section('title', 'Main page')
@section('h1', 'Main page')
@section('content')
    <x-alert.simple-alert></x-alert.simple-alert>
    @if($cars->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Бренд</th>
                <th scope="col">Модель</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Тип кузова</th>
                <th scope="col">Vin</th>
                <th scope="col">Страна производства</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <th scope="row">{{ $car->id }}</th>
                        <td>
                            <div class="brand">{{ $car->brand->title }}</div>
                        </td>
                        <td>
                            <div class="model">{{ $car->model }}</div>
                        </td>
                        <td>
                            <div class="price">{{ $car->price }}</div>
                        </td>
                        <td>
                            <div class="body_type">{{ $bodyTypes[$car->body_type] }}</div>
                        </td>
                        <td>
                            <div class="vin">{{ $car->vin }}</div>
                        </td>
                        <td>
                            <div class="country">{{ $car->brand->country->name }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="col-md-3 mx-auto">
            <h3>Нет автомобилей</h3>
        </div>
    @endif
@endsection
