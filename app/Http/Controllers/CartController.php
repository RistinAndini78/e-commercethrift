<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
    public function add_to_cart(Product $product, Request $request)
    {
        // Validasi jumlah produk yang ditambahkan
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $product->stock
        ]);

        $user_id = Auth::id();
        $product_id = $product->id;
        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();
        if ($existing_cart == null) {
            // Tambahkan produk ke keranjang jika belum ada
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        } else {
            // Update jumlah produk dalam keranjang jika sudah ada
            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }
        return Redirect::route('show_cart');
    }

    // Constructor untuk memerlukan authentikasi
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan keranjang belanja
    public function show_cart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', compact('carts'));
    }

    // Mengupdate jumlah produk dalam keranjang
    public function update_cart(Cart $cart, Request $request)
    {
        // Validasi jumlah produk yang diupdate
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);
        $cart->update([
            'amount' => $request->amount
        ]);
        return Redirect::route('show_cart');
    }

    // Menghapus produk dari keranjang
    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::back();
    }
}
