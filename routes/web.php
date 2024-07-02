<?php

use App\Models\Product;
use App\Models\Product_kind_prop;
use App\Models\Product_kind;
use App\Models\Property;
use App\Models\Delivery_method;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return redirect('/1433');
});

Route::get('/{id}', function (Request $request) {

    //Здесь название продукта
    $product = Product::find($request->id);

    //Я так понимаю описание
    $kind = $product->kinds()->first();

    //Аналоги товара
    $rawAnalogies = $product->analogies()->get();
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

    //Что выводить в цене
    if ($product->special_price) {
        $price = $product->special_price . " ₽";
    } else if (!$product->special_price && !$product->price) {
        $price = "По запросу";
    } else {
        $price = $product->price . " ₽";
    }

    //Что выводить в стоке
    if ($product->stock > 0) {
        $stock = "В наличии: " . $product->stock . " шт.";
    } else if ($product->stock == 0) {
        $stock = "Срок поставки: " . $product->vendor()->first()->delivery_time;
    } else {
        $stock = "Ожидается";
    }

    //logo

    if ($product->vendor()->first()->logo) {
        $logo = "<img src='$product->vendor()->first()->logo' alt='brand logo'/>";
    } else {
        $logo = $product->vendor()->first()->name;
    }

    //brand info
    $brandInfo = [
        "name" => $product->vendor()->first()->name,
        "logo" => $product->vendor()->first()->logo,
        "country" => $product->vendor()->first()->country,
        "warranty" => $product->vendor()->first()->warranty,
    ];

    $vendorName = $product->vendor()->first()->name;

    //Что выводить в доставке
    $deliveryMethods = Delivery_method::all();

    //Дерево каталога
    $catalogTree = [
      'url1' => 'Главная',
      'url2' => 'Каталог товаров',
      'url3' => $product->category()->first() ? $product->category()->first()->name : "default", //наверняка заглушка, пока категории не заполнены
      'url4' => $kind->name,
      'url5' => $product->title,
    ];

    //информация об упаковке
    $packageInfo = [
        'length' => $product->package_length,
        'width' => $product->package_width,
        'height' => $product->package_height,
        'weight' => $product->package_weight,
    ];



    return view('welcome', compact('product', 'kind', 'kind_props', 'characteristics', 'related', 'analogies', 'price', 'stock', 'deliveryMethods', 'catalogTree', 'logo', 'brandInfo', 'packageInfo'));
})->name('product');
