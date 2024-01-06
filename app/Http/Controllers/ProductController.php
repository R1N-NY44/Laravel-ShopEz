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
        return view('dashboard', [
            'products' => Product::all()
        ]);
    }
    
    public function admin_dashboard()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('productDetails', [
            'product' => Product::find($product->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('Admin.editProduct', [
            'product' => Product::find($product->id)
        ]);
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
            'productIcon' => 'nullable|image',
            'minimumOrder' => 'required'
        ]);

        if($request->file('productIcon')) {
            if($request->old_image) {
                Storage::delete($request->old_image);
            }
            $updateProduct['productIcon'] = $request->file('productIcon')->store('product-images');
        }

        Product::where('id', $product->id)->update($updateProduct);

        return redirect('/admin/dashboard')->with('success', 'Berhasil update produk');
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
