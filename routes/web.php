<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductKindController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_kind_prop;
use App\Models\Product_kind;
use App\Models\Property;
use App\Models\Delivery_method;
use App\ViewModels\ProductViewModel;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('welcome');
});

//регистрация

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login');

//админка
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');


Route::get('/products/{product}', [ProductController::class, 'show'])->name('product');

//Products

Route::prefix('admin')->name('admin.')->group(function () {
    //Products
    Route::get('/products', [AdminProductController::class, 'index'])->name('product.index');

    Route::get('/products/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('product.store');

    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::patch('/products/{product}/update', [AdminProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('product.destroy');

    // Product Kinds
    Route::get('/product-kinds', [AdminProductKindController::class, 'index'])->name('product-kinds.index');
    Route::get('/product-kinds/create', [AdminProductKindController::class, 'create'])->name('product-kinds.create');
    Route::post('/product-kinds', [AdminProductKindController::class, 'store'])->name('product-kinds.store');
    Route::get('/product-kinds/{productKind}/edit', [AdminProductKindController::class, 'edit'])->name('product-kinds.edit');
    Route::patch('/product-kinds/{productKind}/update', [AdminProductKindController::class, 'update'])->name('product-kinds.update');
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
