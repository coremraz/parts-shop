@props(['kind','product', 'price', 'stock', 'deliveryMethods', 'logo', 'vendorName'])

<div class="flex flex-col">
    <x-product-card.title :name="$kind->name . ' ' . $product->title"/>

    <div class="flex">
        <div>
            <x-product-card.card-logo :logo="$logo"/>
            <x-product-card.short-description :plural="$kind->name_plural" :name="$product->title" :article="$product->article"
                                 :shortDescription="$product->short_description"/>
        </div>


        <x-product-card.buy-block :price="$price" :stock="$stock" :deliveryMethods="$deliveryMethods"/>
    </div>
</div>
