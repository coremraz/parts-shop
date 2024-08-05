<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Загрузка данных из Excel</h1>

    <form action="{{ route('admin.orders.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="excel_file" class="block text-gray-700 text-sm font-bold mb-2">Выберите файл Excel:</label>
            <input type="file" name="excel_file" id="excel_file" class="border border-gray-400 p-2 rounded-lg w-full">
        </div>
        @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Загрузить</button>
    </form>
</div>

</body>
</html>
