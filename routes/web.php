<?php

use App\Models\Product;
use App\Models\Product_kind_prop;
use App\Models\Product_kind;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    //Здесь название продукта
    $products = Product::find(1433);

    //Я так понимаю описание
    $kind = $products->kinds()->first();

    //Аналоги товара
    $rawAnalogies = $products->analogies()->get();
    $analogies = [];

    //Проверяем, есть ли вообще аналоги
    if (!empty($rawAnalogies)) {
        foreach ($rawAnalogies as $analog) {
            if ($analog->name != null || $analog->article != null) {
                //Проверка на публикацию
                if ($analog->vendor()->first()->published != 0) {
                    //Если артикул и имя есть отображаются оба, если чего-то не хватает - отображается что-то одно (тернарный оператор)
                    $analogies[$analog->vendor()->first()->name] = $analog->name ? ($analog->article ? $analog->name . " ($analog->article)" : $analog->name) : $analog->article;
                }
            }
        }
    }


    //Здесь берем свойства, в модели есть методы получения значений свойств
    $kind_props = Product_kind::find($kind->id)->props()->get();

    //Определяем набор типов «сопутствующих товаров», которым обладает данный вид товара
    $kind_related_types = Product_kind::find($kind->id)->related_types()->get();

    //Массив похожих товаров
    $related = [];

    //Проходимся по типам и ищем их значения через модель
    foreach ($kind_related_types as $type) {
        if ($type->related_products()->first() != null) {
            $related[$type->name] = $type->related_products()->first()->comment_1;
        }
    }

    //Массив характеристик, который пойдет во view
    $characteristics = [];

    //Проходимся по характеристикам и ищем их значения через модель
    foreach ($kind_props as $kind_prop) {
        $characteristics[$kind_prop->name] = $kind_prop->values()->first()->value;
    }

    return view('welcome', compact('products', 'kind', 'kind_props', 'characteristics', 'related', 'analogies'));
});
