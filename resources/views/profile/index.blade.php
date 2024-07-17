@extends('components.layouts.base')
@props(['user'])

@section('content')
    <div class="flex flex-col">
        <span>Имя: {{$user->fio}} </span>
        <span>Дата рождения: {{$user->birth_date}}</span>
        <span>Телефон: {{$user->number}}</span>
        <span>Email: {{$user->email}}</span>
        <span>Группа: {{$user->group()->first()->name}}</span>
        <x-ui.button><a href="{{route('logout')}}">Выйти</a></x-ui.button>
    </div>
@endsection
