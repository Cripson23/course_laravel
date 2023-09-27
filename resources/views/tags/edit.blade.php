@extends('layouts.main-extend')
@section('title', 'Редактирование тэга')
@section('h1', 'Редактирование тэга')

@section('content')
    <x-form action="{{ route('tags.update', [ $tag->id ]) }}" method="put">
        @bind($tag)
            @include('tags.form')
        @endbind
        <a class="btn btn-primary me-3" href="{{ route('tags.index') }}">Назад</a>
        <button class="btn btn-success">Сохранить</button>
    </x-form>
@stop
