@extends('components.layouts.base')
<div style="display: flex; flex-direction: column;">
    <x-product-card.product-card :kind="$kind" :product="$product" :price="$price" :stock="$stock"
                                 :deliveryMethods="$deliveryMethods" :logo="$logo" :brandInfo="$brandInfo"
                                 :characteristics="$characteristics" :catalogTree="$catalogTree" :related="$related"
                                 :analogies="$analogies" :packageInfo="$packageInfo" :complectation="$complectation"/>
</div>
