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

        <x-ui.button type="submit">Зарегистрироваться</x-ui.button>
    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let checkbox = document.getElementById('company-checkbox');
        let inputContainer = document.getElementById('company-input-container');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                let inn = document.createElement('input');
                inn.type = 'text';
                inn.name = 'inn';
                inn.placeholder = 'ИНН организации';
                inputContainer.appendChild(inn);

                let companyName = document.createElement('input');
                companyName.type = 'text';
                companyName.name = 'company_name';
                companyName.placeholder = 'Название организации';
                inputContainer.appendChild(companyName);
            } else {
                inputContainer.innerHTML = '';
            }
        });
    });
</script>
