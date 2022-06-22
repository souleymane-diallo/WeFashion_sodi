<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontController extends Controller
{
    protected $paginate = 6;

    // return all products
    public function index()
    {
        $products = Product::published()->latest()->with('picture','category')->paginate($this->paginate);

        return view('front.index', compact('products'));
    }

    public function show(int $id)
    {
        $product = Product::with('category', 'picture')->find($id);
        return view('front.show', compact('product'));
    }

    public function showProductBySale()
    {
        $products = Product::published()->with('picture')->where('state', 'sale')->paginate($this->paginate);
        // dd($products);
        // $sales = Product::where('state', 'sale')->get();
        return view('front.sale', compact('products'));
    }

    public function showProductByMan()
    {
        $products = Product::published()->with('category', 'picture')->where('category_id', 1)->paginate($this->paginate);
        // dd($products);
        return view('front.man', compact('products'));
    }

    public function showProductByWoman()
    {
        $products = Product::published()->with('category', 'picture')->where('category_id', 2)->paginate($this->paginate);
        // dd($products);
        return view('front.woman', compact('products'));
    }
}
