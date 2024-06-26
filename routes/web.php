<?php

use App\Models\Product;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    //Здесь название продукта
    $products = \App\Models\Product::find(1);
    //Я так понимаю описание
    $kinds = $products->kinds()->get();
    //Здесь берем свойства, в модели есть методы получения значений свойств
    $kind_props = \App\Models\Product_kind_prop::find(1)->get();

    dd(\App\Models\Product::getRelations());
    return view('welcome', compact('products', 'kinds', 'kind_props', 'properties'));
});
