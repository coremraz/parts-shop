@extends('components.layouts.base')

@section('content')
    <form action="{{route('login')}}" method="POST" class="flex flex-col w-1/6 m-4">
        @csrf
        <label>Дата рождения:</label>
        <x-ui.input type="date" name="birth-date"/>
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
                <input name="company" type="checkbox" id="company-checkbox">
            </label>
        </div>
        <div id="company-input-container"></div>

        <x-ui.button type="submit">Зарегистрироваться</x-ui.button>
    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let checkbox = document.getElementById('company-checkbox');
        let inputContainer = document.getElementById('company-input-container');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                let input = document.createElement('input');
                input.type = 'text';
                input.name = 'company-name';
                input.placeholder = 'ИНН организации';
                inputContainer.appendChild(input);
            } else {
                inputContainer.innerHTML = '';
            }
        });
    });
</script>
