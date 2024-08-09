<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\ViewModels\ProductViewModel;

class ProductController extends Controller
{
public function show(Product $product)
{
$viewModel = new ProductViewModel($product);

return view('product-card', compact('viewModel'));
}
}
