<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{
    //menampilakan detail struck
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        if ($carts == null) {
            return Redirect::back();
        }
        $order = Order::create([
            'user_id' => $user_id
        ]);
        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);
            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);
            $cart->delete();
        }
        return Redirect::back();
    }
    //untuk menampilkan pesanan
    public function index_order()
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin){
            $orders = Order::all();
        }else{
            $orders = Order::where('user_id', $user->id)->get();
        }

        return view('index_order', compact('orders'));
    }
    //untuk menampilkan detail pesanan
    public function show_order(Order $order)
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin || $order->user_id == $user->id){
        return view('show_order', compact('order'));
    }
      return view('show_order', compact('order'));
    }
    //admin meng-confirm pembayaran
    public function submit_payment_receipt(Order $order, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        $order->update([
            'bank' => $request->payment_method,
            'delivery' => $request->shipping_method,
            'payment_receipt' => $path
        ]);
        return Redirect::back();
    }
    // admin sudah meng-confirm pembayaran
    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);
        return Redirect::back();
    }
    //transaksi nota
    public function NotaTransaksi(Order $order)
    {
        return view('nota', compact('order'));
    }

}
