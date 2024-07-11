<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductKindController;
use App\Models\Category;
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

//админка
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');


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
                if (isset($related[$type->name])) {
                    $related[$type->name][] = ["name" => $typeProduct->product()->first()->title, "id" => $typeProduct->product()->first()->id];
                } else {
                    $related[$type->name][] = ["name" => $typeProduct->product()->first()->title, "id" => $typeProduct->product()->first()->id];
                }
            }
        }
    }

    //Массив характеристик, который пойдет во view
    $characteristics = [];

    //Проходимся по характеристикам и ищем их значения через модель
    foreach ($kind_props as $kind_prop) {
        if($kind_prop->section != 0) {
            $characteristics["<b>" .$kind_prop->name . "</b>"]  = "";
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

    //Что выводить в доставке
    $deliveryMethods = Delivery_method::all();

    //Дерево каталога
    function parentCategories($category)
    {
        $categoryIds = [];

        // Добавляем исходную категорию
        $categoryIds[$category->name] = $category->name;

        if ($category->parentCategory()->first() != null) {
            $tempCategory = $category->parentCategory()->first();
            $categoryIds = array_merge(parentCategories($tempCategory), $categoryIds);
        } else {
            // Добавляем корневые элементы
            $categoryIds = array_merge(['Главная' => 'Главная', 'Каталог товаров' => 'Каталог товаров'], $categoryIds);
        }

        return $categoryIds;
    }

    $catalogTree = parentCategories($product->category()->first());
    $catalogTree[] = $product->title; // Добавляем в конец дерева имя товара



    //информация об упаковке
    $packageInfo = [
        'length' => $product->length,
        'width' => $product->width,
        'height' => $product->height,
        'weight' => $product->weight,
    ];


    return view('welcome', compact('product', 'kind', 'kind_props', 'characteristics', 'related', 'analogies', 'price', 'stock', 'deliveryMethods', 'catalogTree', 'logo', 'brandInfo', 'packageInfo'));
})->name('product');


//Products

Route::prefix('admin')->name('admin.')->group(function () {
    //Products
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');

    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/products/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Product Kinds
    Route::get('/product-kinds', [ProductKindController::class, 'index'])->name('product-kinds.index');
    Route::get('/product-kinds/create', [ProductKindController::class, 'create'])->name('product-kinds.create');
    Route::post('/product-kinds', [ProductKindController::class, 'store'])->name('product-kinds.store');
    Route::get('/product-kinds/{productKind}/edit', [ProductKindController::class, 'edit'])->name('product-kinds.edit');
    Route::patch('/product-kinds/{productKind}/update', [ProductKindController::class, 'update'])->name('product-kinds.update');
});

//product kind props

Route::get('/admin/product-kinds-props', function () {
    $productKindProps = Product_kind_prop::paginate(100);
    return view('admin.product-kind-props.index', compact('productKindProps'));
})->name('product-kind-props.index');

Route::get('/admin/product-kinds-props/{productKindProp}/edit', function (Product_kind_prop $productKindProp) {
    return view('admin.product-kind-props.edit', compact('productKindProp'));
})->name('product-kind-props.edit');

Route::patch('/admin/product-kinds-props/{productKindProp}/store', function (Request $request, Product_kind_prop $productKindProp) {
    $productKindProp->fill($request->all());
    $productKindProp->save();
    return redirect()->back();
})->name('product-kind-props.store');

Route::delete('/admin/product-kinds-props/{productKindProp}', function (Request $request, Product_kind_prop $productKindProp) {
    $productKindProp->delete();
    return redirect()->route('product-kind-props.index');
})->name('product-kind-props.destroy');
