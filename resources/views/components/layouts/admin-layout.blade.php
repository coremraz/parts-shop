<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
@yield('content')
</body>
</html>
