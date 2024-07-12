<?php

namespace App\Http\Controllers;

use App\Models\Delivery_method;
use App\Models\Product;
use App\Models\Product_kind;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product) // Внедряем модель Product
    {
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
        $kind_props = Product_kind::find($kind->id)->props()->get()->sortBy('sorting');

        //Определяем набор типов «сопутствующих товаров», которым обладает данный вид товара
        $kind_related_types = Product_kind::find($kind->id)->relatedTypes()->get();

        //Массив похожих товаров
        $related = [];

        //Проходимся по типам и ищем их значения через модель
        foreach ($kind_related_types as $type) {
            if ($type->relatedProducts()->get() != null) {
                //Получаем все связанные товары
                $typeProducts = $type->relatedProducts()->get()->sortBy('sorting');
                //Проходимся по связанным товарам и записываем в каждую категорию
                foreach ($typeProducts as $typeProduct) {
                    $related[$type->name][] = ["name" => $typeProduct->product()->first()->title, "id" => $typeProduct->product()->first()->id];
                }
            }
        }

        //Массив характеристик, который пойдет во view
        $characteristics = [];

        //Проходимся по характеристикам и ищем их значения через модель
        foreach ($kind_props as $kind_prop) {
            if ($kind_prop->section != 0) {
                $characteristics["<b>" . $kind_prop->name . "</b>"] = "";
            } else {
                //проверка, есть ли характеристика, если нет - не выводим
                if (!$kind_prop->values()->first()->value) {
                    continue;
                } else {
                    $characteristics[$kind_prop->name] = ": " . $kind_prop->values()->first()->value;
                }
            }
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
        $stock = match (true) {
            $product->stock > 0 => "В наличии: " . $product->stock . " шт.",
            $product->stock == 0 => "Срок поставки: " . $product->vendor()->first()->delivery_time,
            default => "Ожидается",
        };

        //logo
        $logo = $product->vendor()->first()->logo
            ? "<img src='$product->vendor()->first()->logo' alt='brand logo'/>"
            : $product->vendor()->first()->name;

        //brand info
        $brandInfo = [
            "name" => $product->vendor()->first()->name,
            "logo" => $product->vendor()->first()->logo,
            "country" => $product->vendor()->first()->country,
            "warranty" => $product->vendor()->first()->warranty,
        ];

        //Что выводить в доставке
        $deliveryMethods = Delivery_method::all();

        //Дерево каталога
        $catalogTree = $this->parentCategories($product->category()->first());
        $catalogTree[] = $product->title; // Добавляем в конец дерева имя товара

        //информация об упаковке
        $packageInfo = [
            'length' => $product->length,
            'width' => $product->width,
            'height' => $product->height,
            'weight' => $product->weight,
        ];

        //Комплектация
        $complectation = [];

        //    Если у товара products.composite_product =0
        //    или не заполнена комплектация, то данный блок не отображается на сайте полностью
        if (!$product->composite_product == 0 && $kind->compositeElements()->get()) {
            //тип товара
            $compositeKindElements = $kind->compositeElements()->get()->sortBy('sorting');
            //присваиваем типу имя и артикул
            foreach ($compositeKindElements as $element) {
                if ($element->elements()->first()) {
                    $complectation[$element->element] = $element->elements()->first()->product()->first()->title . "(" . $element->elements()->first()->product()->first()->article . ")";
                }
            }
        } else {
            $complectation = null;
        }

        return view('product-card', compact(
            'product',
            'kind',
            'kind_props',
            'characteristics',
            'related',
            'analogies',
            'price',
            'stock',
            'deliveryMethods',
            'catalogTree',
            'logo',
            'brandInfo',
            'packageInfo',
            'complectation'
        ));
    }

    // Вынесено в отдельный метод для чистоты контроллера
    private function parentCategories($category)
    {
        $categoryIds = [];

        // Добавляем исходную категорию
        $categoryIds[$category->name] = $category->name;

        if ($category->parentCategory()->first() != null) {
            $tempCategory = $category->parentCategory()->first();
            $categoryIds = array_merge($this->parentCategories($tempCategory), $categoryIds);
        } else {
            // Добавляем корневые элементы
            $categoryIds = array_merge(['Главная' => 'Главная', 'Каталог товаров' => 'Каталог товаров'], $categoryIds);
        }

        return $categoryIds;
    }
}
