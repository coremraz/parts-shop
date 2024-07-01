@props(['price' => '1337', 'stock' => 'default stock', 'deliveryMethods' => ['1' => 'default', '2' => 'default']])

<div class="flex flex-col m-4 space-y-2 w-64">
    <h3 class="font-bold text-3xl">{{$price}}</h3>
    <span>{{$stock}}</span>
    <button class="text-black text-lg bg-gray-400 font-bold p-2 w-auto max-w-2xl">Купить</button>
    <button class="text-black text-lg bg-gray-400 font-bold p-2 w-auto max-w-2xl">Купить в 1 клик</button>
    @foreach($deliveryMethods as $delivery => $method)
        <span>{{$delivery . ': ' . $method}}</span>
    @endforeach
</div>

