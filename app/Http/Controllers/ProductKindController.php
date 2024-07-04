<?php

namespace App\Http\Controllers;

use App\Models\Product_kind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductKindController extends Controller
{
    public function index()
    {
        $productKinds = Product_Kind::orderBy('name', 'asc')->paginate(100);
        return view('admin.product-kinds.index', compact('productKinds'));
    }

    public function create()
    {
        $product = new Product_kind();
        $tableName = $product->getTable();
        $columns = Schema::getColumnListing($tableName);

        return view('admin.product-kinds.create', compact('columns'));
    }

    public function store(Request $request)
    {
        $productKind = new Product_kind($request->all());
        $productKind->save();
        return redirect()->back()->with('success', 'Product kind created successfully!');
    }

    public function edit(Product_Kind $productKind)
    {
        return view('admin.product-kinds.edit', compact('productKind'));
    }

    public function update(Request $request, Product_kind $productKind)
    {
        $productKind->fill($request->all());
        $productKind->save();
        return redirect()->back()->with('success', 'Product kind updated successfully!');
    }

}
