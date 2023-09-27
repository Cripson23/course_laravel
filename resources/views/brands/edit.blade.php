@extends('layouts.main-extend')
@section('title', 'Редактирование бренда')
@section('h1', 'Редактирование бренда')

@section('content')
    <x-form action="{{ route('brands.update', [ $brand->id ]) }}" method="put">
        @bind($brand)
            @include('brands.form')
        @endbind
        <a class="btn btn-primary me-3" href="{{ route('brands.index') }}">Назад</a>
        <button class="btn btn-success">Сохранить</button>
    </x-form>
@stop
