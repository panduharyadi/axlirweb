<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provinsi;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $transactions = Transaction::all();
        // $products = Product::all();
        $transactions = Transaction::selectRaw('transactions.*, products.product_name, products.size, products.price')
            ->join('products', 'products.id', '=', 'transactions.id_product')
            ->get();
        return view('backend.pages.Transaction.Transaction', compact(['transactions']));
    }

    /**
     * method for confirm transaction
     */
    public function confirmTransaction()
    {
        return view('backend.pages.Confirm.confirm');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::find($request->idProduct);

        $product->stock -= intval($request->qty);
        $product->save();

        $price = $product->price; 
        $qty = intval($request->qty);

        $total = $price * $qty;

        $transactions = Transaction::create([
            'id_product' => $request->idProduct,
            'cust_name'  => $request->custName,
            'noHp'       => $request->noHp,
            'alamat'     => $request->alamat,
            'qty'        => $qty,
            'total'      => $total,
            'status'     => 'unpaid'
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
