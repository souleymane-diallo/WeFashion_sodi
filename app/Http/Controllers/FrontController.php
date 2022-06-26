<?php

namespace App\Http\Controllers;

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

    // display a product in detail from its id
    public function show(int $id)
    {
        $product = Product::with('category', 'picture')->find($id);
        return view('front.show', compact('product'));
    }

    // display products on sale
    public function showProductBySale()
    {
        $products = Product::published()->with('category','picture')->where('state', 'sale')->paginate($this->paginate);

        return view('front.sale', compact('products'));
    }

    // display products that have category men
    public function showProductByMan()
    {
        $products = Product::published()->with('category', 'picture')->where('category_id', 1)->paginate($this->paginate);

        return view('front.man', compact('products'));
    }

    // display products that have category women
    public function showProductByWoman()
    {
        $products = Product::published()->with('category', 'picture')->where('category_id', 2)->paginate($this->paginate);

        return view('front.woman', compact('products'));
    }
}
