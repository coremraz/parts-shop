@extends('components.layouts.base')

@section('content')
    <form action="{{route('login.store')}}" method="POST" class="flex flex-col w-1/6 m-4">
        @csrf
        <label>Email</label>
        <x-ui.input name="email"/>
        <label>Пароль</label>
        <x-ui.input name="password"/>
        <x-ui.button type="submit">Зарегистрироваться</x-ui.button>
    </form>
@endsection
