@props(['kind','product', 'price', 'stock', 'deliveryMethods'])

<div class="flex flex-col">
    <x-product-card-title :name="$kind->name . ' ' . $product->title"/>

    <div class="flex">
        <x-short-description :plural="$kind->name_plural" :name="$product->title" :article="$product->article"
                             :shortDescription="$product->short_description"/>

        <x-buy-block :price="$price" :stock="$stock" :deliveryMethods="$deliveryMethods"/>
    </div>
</div>
