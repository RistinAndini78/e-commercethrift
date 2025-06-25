<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Lakukan pencarian produk berdasarkan nama atau deskripsi
        $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->get();

        return view('search', compact('products', 'query'));
    }
}
