<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cart', [
            'carts' => Cart::where('user_id', Auth::user()->id)->get(),
            'productCount' => Cart::where('user_id', Auth::user()->id)->distinct('id')->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createCart = $request->validate([
            'quantity' => 'required|max:255',
            'purchaseNotes' => 'required|max:255'
        ]);

        $createCart['product_id'] = $request->product_id;
        $createCart['user_id'] = auth()->user()->id;

        Cart::create($createCart);

        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect()->back();
    }

    public function destroyAll()
    {
        Cart::truncate();
        return redirect()->back();
    }

    public function getCart()
    {
        $carts = Cart::with('product:id,productName,productPrice,productCondition')->select('product_id', 'quantity')->get();

        return response()->json($carts, 200);
    }
}
