@extends('components.layouts.base')

@section('content')
    Добро пожаловать @auth() <x-ui.button><a href="{{route('logout')}}">Выйти</a></x-ui.button> @endauth!

@endsection
