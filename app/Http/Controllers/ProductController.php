<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.dashboard', [
            'data_produk' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $createProduct = $request->validate([
            'productName' => 'required|max:255',
            'productPrice' => 'required',
            'productStock' => 'required',
            'productDescription' => 'required|max:255',
            'productCondition' => 'required',
            'productIcon' => 'required|image',
            'minimumOrder' => 'required'
        ]);
        $createProduct['productIcon'] = $request->file('productIcon')->store('product-images');
        
        Product::create($createProduct);

        return redirect()->back()->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $updateProduct = $request->validate([
            'productName' => 'required|max:255',
            'productPrice' => 'required',
            'productStock' => 'required',
            'productDescription' => 'required|max:255',
            'productCondition' => 'required',
            'productIcon' => 'required|image',
            'minimumOrder' => 'required'
        ]);

        if($request->file('productIcon')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $updateProduct['productIcon'] = $request->file('productIcon')->store('product-images');
        }

        Product::where('id', $product->id)->update($updateProduct);

        return back()->with('success', 'Berhasil update satu produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {        
        if($product->productIcon){
            Storage::delete($product->productIcon);
        };
        
        Product::destroy($product->id);
        return redirect()->back();
    }
}
