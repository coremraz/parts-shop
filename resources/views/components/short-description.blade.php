@props(['plural' => 'default plural', 'name' => 'default name', 'article' => 'default article', 'shortDescription' => 'default short description'])

<div class="flex flex-col m-4 space-y-2">
    <h1 class="text-black text-lg bg-gray-400 font-bold p-3 w-auto max-w-2xl">{{$plural}}</h1>
    <h3 class="font-bold">Модель: <span>{{$name}}</span></h3>
    <h3 class="font-bold">Артикул: <span>{{$article}}</span></h3>
    <p>{{$shortDescription}}</p>
    <span>Все характеристики ></span>
</div>

