<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category','subcategory','brand')->latest()->get();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product-management.products_data',compact('products','categories','subcategories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $this->validate($request,[
           'category_id' => 'required',
           'subcategory_id' => 'required',
           'brand_id' => 'required',
           'name' => 'required',
           'price' => 'required',
           'qty' => 'required',
           'description' => 'required',
           
        ]);

        if ($request->hasFile('images'))
         {
            foreach ($request->file('images') as $file)
             {
                $name = $file->getClientOriginalName();
                $file = $file->move(public_path('images/products') , $name);
                $image[] = $name;   
            }    
        }
        $data['images'] = implode(',',$image);
        Product::create($data);
        return back()->with('success','Product Added Successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product-management.edit_products',compact('product','categories','subcategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       $product->category_id = $request->category_id;
       $product->subcategory_id = $request->subcategory_id;
       $product->brand_id = $request->brand_id;
       $product->name = $request->name;
       $product->qty = $request->qty;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->feature = $request->feature;
       
       if ($request->hasFile('images'))
       {
          foreach ($request->file('images') as $file)
           {
              $name = $file->getClientOriginalName();
              $file = $file->move(public_path('images/products') , $name);
              $image[] = $name;   
          }    
      }
      $product['images'] = implode(',',$image);
      $product->save();
      return redirect()->route('products.index')->with('success','Product Updated');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product is Deleted Successfully');
    }
}
