@props(['price' => '1337'])

<div class="flex flex-col m-4 space-y-2 w-64">
    <h3 class="font-bold text-3xl">{{$price}}</h3>
    <span>В наличии: 3шт.</span>
    <button class="text-black text-lg bg-gray-400 font-bold p-2 w-auto max-w-2xl">Купить</button>
    <button class="text-black text-lg bg-gray-400 font-bold p-2 w-auto max-w-2xl">Купить в 1 клик</button>
    <span>Самовывоз: бесплатно</span>
    <span>Доставка: от 300р.</span>
</div>

