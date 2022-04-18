<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        
        $latest_product = Product::with('category')
                ->latest()
                ->limit(5)
                ->get();
        $featured_products = Product::where('feature',1)
                ->take(5)
                ->latest()
                ->get(['id','price','name','images']);
        return view('frontend.index',compact('latest_product','featured_products'));        
    }
    
    public function allProducts(Product $product)
    {
        $products = Product::latest()->paginate(20);
        return view('frontend.products.all-products',compact('products'));
    }

    public function productDetail(Product $product)
    {
        $product->load('brand','category','subcategory');
        return view('frontend.products.product-detail',compact('product'));
    }

    public function search(Request $request)
    {
        $search_product = Product::where('name','LIKE','%'.$request->search . '%')
                                                                   ->OrWhere('description','LIKE','%'.$request->search . '%')
                                                                   ->get();
                                                                    // dd($search_product);
       return view('frontend.search-detail');
    }
}
