@extends('components.layouts.base')
@props(['user'])

@section('content')
    <div class="flex flex-col">
        <span>Имя: {{$user->fio}} </span>
        <span>Телефон: {{$user->number}}</span>
        <span>Email: {{$user->email}}</span>
        <x-ui.button><a href="{{route('logout')}}">Выйти</a></x-ui.button>
    </div>
@endsection
