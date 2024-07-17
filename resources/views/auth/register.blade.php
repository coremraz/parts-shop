@extends('components.layouts.base')

@section('content')
    <form action="{{route('register.store')}}" method="POST" class="flex flex-col w-1/6 m-4">
        @csrf
        <label>ФИО</label>
        <x-ui.input name="fio"/>
        <label>Email</label>
        <x-ui.input name="email"/>
        <label>Телефон</label>
        <x-ui.input name="number"/>
        <label>Пароль</label>
        <x-ui.input name="password"/>
        <label>Подтверждение пароля</label>
        <x-ui.input name="password_confirmation"/>
        <x-ui.button type="submit">Зарегистрироваться</x-ui.button>
    </form>
@endsection
