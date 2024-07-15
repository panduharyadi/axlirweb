<?php

namespace App\Http\Controllers\User;

use App\Models\Kota;
use App\Models\Product;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function detailProduct(String $id)
    {
        $products = Product::findOrFail($id);

        $provinces = Http::get('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')->json();

        // inisialisasi array buat simpen data kota
        // $citys = [];
        
        // foreach ($provinces as $province) {
        //     $provinceId = $province['id'];
        //     $cityData = Http::get("https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/$provinceId.json")->json();
        //     $citys[$provinceId] = $cityData;
        // }

        return view('frontend.pages.ProductDetail', compact('products', 'provinces'));
    }
}
