<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\Request;

use App\PRODUCT;
use App\Product as AppProduct;
use GuzzleHttp\Handler\Proxy;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth'); 
    }


    public function index()
    {
        
        return view('products.index', 
        ['products' => Product::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
 
        if($categories->count() == 0)
        {
            session()->flash('info', 'You must have some categories before attempting to create a product');

            return view('categories.create');
        }

        return view('products.create',[
            'categories' => Category::all(),
        ]);

      //  ->with('categories', Category::all())
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category_id' => 'required'


        ]);


        // Product::create([

        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        //     'image' => $request->image

 
        // ]);

        $product = new Product;

        $product_image = $request->image; 

        $product_image_new_name = time() . $product_image->GetClientOriginalName();

        $product_image->move('uploads/products/', $product_image_new_name);



        $product->name = $request->name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->image = 'uploads/products/' . $product_image_new_name;

        $product->category_id = $request->category_id;

        $product->save();


        session()->flash('success', 'Product Created Successfully.');
 
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => Product::find($id), 
        'categories' => Category::all()
        ]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'price' => 'required',


        ]);

        $product = Product::find($id);

        if($request->hasFile('image'))
        {

            $product_image = $request->image; 
   
   
            $product_image_new_name = time() . $product_image->GetClientOriginalName();
   
   
            $product_image->move('uploads/products/', $product_image_new_name );

   
            $product->image = 'uploads/products/' . $product_image_new_name;

   
           $product->save();


        }

        $product->name = $request->name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->category_id = $request->category_id;


        $product->save();

 
        session()->flash('success', 'Product Updated Successfully.');
 
        return redirect(route('products.index'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if(file_exists($product->image))
        {
            unlink($product->image);
        }

        $product->delete();

        session()->flash('danger', 'Product Deleted.');
 
        return redirect()->back();


    }
}
