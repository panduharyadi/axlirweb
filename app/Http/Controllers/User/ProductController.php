<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Provinsi;

class ProductController extends Controller
{
    public function detailProduct(String $id)
    {
        $products = Product::findOrFail($id);
        $provinces = Provinsi::all();
        $citys = Kota::all();
        return view('frontend.pages.ProductDetail', compact('products', 'provinces', 'citys'));
    }
}
