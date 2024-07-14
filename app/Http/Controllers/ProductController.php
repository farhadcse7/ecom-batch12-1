<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private  $product;
    public function index()
    {
        return view('admin.product.index', ['products'=>Product::all()]);
    }

    public function create()
    {
        return view('admin.product.create',[
            'categories'=>Category::all(),
            'sub_categories'=>SubCategory::all(),
            'brands'=>Brand::all(),
            'units'=>Unit::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->product=Product::newProduct($request);
        ProductImage::newProductImage($request->file('other_image'), $this->product->id);
        return back()->with('message', 'product info save succcessfullly');
//        return $request;
    }

    public function edit()
    {
        return view('admin.product.edit');
    }

    public function update(Request $request, $id)
    {
        return $request;
    }

    public function destroy($id)
    {
        return $id;
    }
}
