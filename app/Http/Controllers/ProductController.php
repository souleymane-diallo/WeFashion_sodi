<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $paginate = 15;

    public function index()
    {
        $products = Product::latest()->with('category')->paginate($this->paginate);

        return view('back.products.index', compact('products'));
    }
    public function dashboard()
    {
        $products = Product::latest()->with('category')->paginate($this->paginate);
        return view('back.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::pluck('name', 'id')->all();
        //dd($category);
        $sizes = Size::pluck('name', 'id')->all();
        //dd($sizes);
        return view('back.products.create', compact('category', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        $product->sizes()->attach($request->sizes);
        $im = $request->file('picture');

        if (!empty($im)) {
            //$link = Storage::disk('local')->put('images', $im);
            $request->file('picture')->store('images');
            $link = $request->file('picture')->hashName();

            //dd($request->title_image);
            $product->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? 'Default',
            ]);
        }

        return redirect()->route('admin.products.index')->with('message', 'Le produit a bien été créée !');
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

        $category = Category::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        $productSizes = [];
        foreach ($product->sizes as $productSize) {
            $productSizes[] = $productSize->id;
        }

        return view('back.products.create', compact('product', 'category', 'sizes', 'productSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update($request->validated());

        $product->sizes()->sync($request->sizes);

        $im = $request->file('picture');

        if (!empty($im)) {

            $request->file('picture')->store('images');
            $link = $request->file('picture')->hashName();

            if (($product->picture)) {
                Storage::disk('local')->delete($product->picture->link);
                $product->picture()->delete();
            }

            $product->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? 'Default'
            ]);
        }

        return redirect()->route('admin.products.index')->with('message', 'Le Produit a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // delete l'image du storage
        if($product->picture) {
            Storage::disk('local')->delete($product->picture->link);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('message', 'Le produit a bien été supprimer avec succes');
    }
}
