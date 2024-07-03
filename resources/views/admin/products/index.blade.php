<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Products</h1>

    <div class="bg-white shadow-md rounded my-6">
        <table class="w-full table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Название</th>
                <th class="py-3 px-6 text-center">Редактировать</th>
                <th class="py-3 px-6 text-center">Удалить</th>
            </tr>
            </thead>
            <tbody class="text-gray-800 text-sm font-light">
            @foreach($products as $product)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $product->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $product->title }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('product.edit', $product) }}" title="Редактировать" class="text-blue-400 hover:text-blue-600">
                            ✎
                        </a>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <form action="{{ route('product.destroy', $product) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Удалить" class="text-red-500 hover:text-red-700">
                                ×
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
</div>
</body>
</html>
