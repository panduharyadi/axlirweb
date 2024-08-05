<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function backend()
    {
        // chart bar pendapatan perhari
        $transactions = Transaction::where('status', 'Accept')->get();

        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
         
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }

        // total pendapatan perbulan
        $montlyEarnings = Transaction::select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('SUM(CASE WHEN status = "accept" THEN total ELSE 0 END) as total'))
            ->groupBy('month')
            ->get();
        
        // total pendapatan pertahun
        $yearEarnings = Transaction::select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(CASE WHEN status = "accept" THEN total ELSE 0 END) as total'))
            ->groupBy('year')
            ->get();
        
        // total pengiriman
        $delivered = Transaction::where('pengiriman', 'dikirim')->count();
        $pending = Transaction::where('pengiriman', 'menunggu')->count();
        $cancelled = Transaction::where('pengiriman', 'batal')->count();

        // produk terlaris
        $mostSoldProducts = Transaction::select('id_product', DB::raw('SUM(qty) as total_qty'))
            ->where('status', 'Accept')
            ->groupBy('id_product')
            ->orderByDesc('total_qty')
            ->take(4)
            ->get();

        foreach ($mostSoldProducts as $product) {
            $product->product = Product::find($product->id_product);
        }

        return view("backend.pages.Dashboard", compact('montlyEarnings', 'yearEarnings', 'chartData', 'delivered', 'pending', 'cancelled', 'mostSoldProducts'));
    }

    public function frontend()
    {
        $sliders = Slider::all();
        $products = Product::all();

        return view("frontend.pages.Home", compact('sliders', 'products'));
    }
}
