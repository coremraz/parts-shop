@props(['complectation'])

<div class="flex flex-col m-4 space-y-2 w-64">
    <h1><b>Комплектация</b></h1>
    @foreach($complectation as $type => $products)
        @foreach($products as $product)
            <span>{{$type . " " . $product}}</span>
        @endforeach
    @endforeach

 </div>

