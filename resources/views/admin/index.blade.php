<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
<div class="flex flex-col container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Admin Panel</h1>

    <div class="flex">
        <x-ui.admin.card title="Товары [Products]" >
            <x-ui.admin.button href="{{ route('admin.product.index') }}">Manage Products</x-ui.admin.button>
        </x-ui.admin.card>

        <x-ui.admin.card title="Описание [Product Kinds]" >
            <x-ui.admin.button href="{{ route('admin.product-kinds.index') }}">Manage Product Kinds</x-ui.admin.button>
        </x-ui.admin.card>
        <x-ui.admin.card title="Характеристики [Product kind props]" >
            <x-ui.admin.button href="{{ route('product-kind-props.index') }}">Manage Props</x-ui.admin.button>
        </x-ui.admin.card>

        <x-ui.admin.card title="Управление заказами поставщикам" >
            <x-ui.admin.button href="{{ route('admin.orders.index') }}">Manage Props</x-ui.admin.button>
        </x-ui.admin.card>
    </div>
</div>
</body>
</html>
