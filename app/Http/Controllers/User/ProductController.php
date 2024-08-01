<?php

namespace App\Http\Controllers\User;

use App\Models\Kota;
use App\Models\Product;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductFile;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function detailProduct(String $id)
    {
        $products = Product::findOrFail($id);

        $provinces = Http::get('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')->json();

        $productFile = ProductFile::select('*')
            ->where('product_id', $id)
            ->get();

        $relatedProduct = Product::all();

        return view('frontend.pages.ProductDetail', compact(['products', 'provinces', 'productFile', 'relatedProduct']));
    }
}
