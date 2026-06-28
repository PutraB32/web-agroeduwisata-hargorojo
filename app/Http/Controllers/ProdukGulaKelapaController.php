<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukGulaKelapaController extends Controller
{
    public function index(Request $request)
    {
        // Fetch Produk Unggulan
         $produkUnggulan = Produk::where('produk_unggulan', true)
                                ->with('testimoni')
                                ->get();

                                
        return view('pages.produk', compact('produkUnggulan'));
    }
}

