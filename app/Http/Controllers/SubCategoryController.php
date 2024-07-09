<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index', ['sub_categories'=>SubCategory::all()]);
    }

    public function create()
    {
//        return view('admin.sub-category.create',['categories'=>Category::all()]);
//        return view('admin.sub-category.create',['categories'=>Category::where('status',1)->get()]);
        return view('admin.sub-category.create',[
            'categories'=>Category::where('status',1)->orderBy('id','desc')->get()
//            'categories'=>Category::all()
        ]);
    }

    public function store(Request $request){
        SubCategory::newSubCategory($request);
        return back()->with('message', 'Create Sub Category Successfully');
    }
}
