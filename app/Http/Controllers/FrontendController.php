<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Product;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', ['products' => Product::paginate(15)]);
    }

    public function singleproduct($id)
    {
        return view('single', ['product' => Product::find($id)]);
    }

    public function shop()
    {
        return view('shop', [
            'products' => Product::paginate(20),
            'categories' => Category::get(),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function category($id)
    {

        $category = Category::find($id);

        return view('category')->with('category', '$category')
            ->with('title', '$category->name')
            ->with('categories', Category::take(5)->get());
    }

    public function SingleCatgory($id)
    {
        return view('shop', [
            'products' => Product::Where('category_id', "=", $id)->paginate(20),
            'categories' => Category::get(),
        ]);
    }
}


