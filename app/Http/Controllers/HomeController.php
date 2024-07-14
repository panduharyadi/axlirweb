<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function backend()
    {
        return view("backend.pages.Dashboard");
    }

    public function frontend()
    {
        $sliders = Slider::all();
        $products = Product::all();
        return view("frontend.pages.Home", compact('sliders', 'products'));
    }
}
