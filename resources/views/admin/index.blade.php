<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td><a href="{{route('product.edit', $product)}}" title="Редактировать">✎</a></td>
            <td><a href="#" title="Удалить">❌</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$products->links()}}
</body>
</html>
