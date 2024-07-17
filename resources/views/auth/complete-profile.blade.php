@extends('components.layouts.base')

@section('content')
    <form action="{{route('complete-profile.store')}}" method="POST" class="flex flex-col w-1/6 m-4">
        @csrf
        <label>Дата рождения:</label>
        <x-ui.input type="date" name="birth_date"/>
        <label>Пол</label>
        <label>
            <select name="sex">
                <option>Мужской</option>
                <option>Женский</option>
            </select>
        </label>
        <div>
            <label>Представитель организации</label>
            <label>
                <input name="delegate" type="checkbox" id="company-checkbox">
            </label>
        </div>
        <div id="company-input-container"></div>

        <x-ui.button type="submit">Сохранить</x-ui.button>
    </form>
@endsection
