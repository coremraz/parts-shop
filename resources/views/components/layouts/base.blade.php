<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen min-w-screen">
<x-includes.header/>

<main class="bg-gray-100">
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
</main>

<x-includes.footer />
</body>

</html>
