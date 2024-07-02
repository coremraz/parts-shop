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
    <x-product-card.product-card :kind="$kind" :product="$product" :price="$price" :stock="$stock"
                                 :deliveryMethods="$deliveryMethods" :logo="$logo" :brandInfo="$brandInfo"
                                 :characteristics="$characteristics" :catalogTree="$catalogTree" :related="$related"
                                 :analogies="$analogies" :packageInfo="$packageInfo"/>
</div>
</body>

</html>
