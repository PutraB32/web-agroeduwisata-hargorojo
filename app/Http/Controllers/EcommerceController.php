<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class EcommerceController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::all();
        return view('pages.e-commerce', compact('produks'));
    }
}
