@extends('layouts.main-extend')
@section('title', 'Редактирование страны')
@section('h1', 'Редактирование страны')

@section('content')
    <x-form action="{{ route('countries.update', [ $country->id ]) }}" method="put">
        @bind($country)
            @include('countries.form')
        @endbind
        <a class="btn btn-primary me-3" href="{{ route('countries.index') }}">Назад</a>
        <button class="btn btn-success">Сохранить</button>
    </x-form>
@stop
