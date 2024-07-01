<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body>
<div style="display: flex; flex-direction: column;">

    <x-product-card.product-card :kind="$kind" :product="$product" :price="$price" :stock="$stock" :deliveryMethods="$deliveryMethods"/>

    <span><b>Name:</b> {{$product->title}}</span>


    <span><b>Kind:</b> {{$kind->name}}</span>

    @foreach($characteristics as $prop => $value)
        <span><b>{{ $prop }}:</b> {{ $value}}</span>
    @endforeach
    <br>
    <h1 style="color:blue;"><b>ПОХОЖИЕ ТОВАРЫ</b></h1>
    @foreach($related as $prop => $value)
        <span><b>{{ $prop }}:</b> {{ $value}}</span>
    @endforeach
    <br>
    <h1 style="color:blue;"><b>АНАЛОГИ</b></h1>
    @foreach($analogies as $vendor => $analog)
        <span><b>{{ $vendor }}:</b> {{ $analog}}</span>
    @endforeach
</div>
</body>

</html>
