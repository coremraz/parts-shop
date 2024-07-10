@props(['kind','product', 'price', 'stock', 'deliveryMethods', 'logo', 'vendorName', 'brandInfo', 'characteristics', 'catalogTree', 'related', 'analogies', 'packageInfo'])

<div class="flex flex-col items-center w-screen">
    <x-product-card.category-tree :catalogTree="$catalogTree"/>
    <x-product-card.title :name="$kind->name . ' ' . $product->title"/>
    <div class="flex w-screen justify-around ">
        <div>
            <x-product-card.card-logo :logo="$logo"/>
            <x-product-card.short-description :plural="$kind->name_plural" :name="$product->title" :article="$product->article"
                                 :shortDescription="$product->short_description"/>
        </div>
        <x-product-card.buy-block :price="$price" :stock="$stock" :deliveryMethods="$deliveryMethods"/>
    </div>
    <x-product-card.card-menu/>
    <x-product-card.description :description="$product->description" id="specs"/>
    <div class="flex justify-around w-screen">
        <div class="flex flex-col space-y-1">
            <span class="font-bold text-2xl mb-2">Технические характеристики</span>
            @foreach($characteristics as $prop => $value)
                <span>{!! $prop  !!}{{ $value}}</span>
            @endforeach
        </div>
        <div>
            <x-product-card.brand-info :brandInfo="$brandInfo" />
            <x-product-card.package-info :packageInfo="$packageInfo"/>
        </div>
    </div>
    <h1 id="similar" style="color:blue;"><b>ПОХОЖИЕ ТОВАРЫ</b></h1>
    @foreach($related as $prop => $value)
        <span><b>{{ $prop }}:</b> {{ $value}}</span>
    @endforeach
    <br>
    <h1 id="analogs" style="color:blue;"><b>АНАЛОГИ</b></h1>
    @foreach($analogies as $vendor => $analog)
        <span><b>{{ $vendor }}:</b> {{ $analog}}</span>
    @endforeach
</div>
