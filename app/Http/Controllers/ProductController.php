<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(100);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();
        $tableName = $product->getTable();
        $columns = Schema::getColumnListing($tableName);

        return view('admin.products.create', compact('columns'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_kind_id' => 'required|exists:product_kinds,id',
            'title' => 'required|string|max:255',
            'article' => 'required|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'barcode' => 'required|string|max:255',
            'supplier_price' => 'required|numeric',
            'price' => 'required|numeric',
            'special_price' => 'nullable|numeric',
            'pieces_per_pack' => 'required|integer',
            'stock' => 'required|integer',
            'minimum_stock' => 'required|integer',
            'sorting' => 'required|integer',
            'tn_ved' => 'required|string',
            'published' => 'required',
            'weight' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
            'package_weight' => 'required|numeric',
            'package_width' => 'required|numeric',
            'package_height' => 'required|numeric',
            'package_length' => 'required|numeric',
            'category_id' => 'required',
            'vendor_id' => 'required',
            'currency_id' => 'required',
        ]);
        $product = new Product($validatedData);
        $product->save();
        return redirect()->back()->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }



    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
