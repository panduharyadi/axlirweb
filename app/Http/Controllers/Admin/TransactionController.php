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
        $confirmTransaction = Transaction::selectRaw('transactions.*, products.product_name')
            ->join('products', 'products.id', '=', 'transactions.id_product')
            ->get();
        return view('backend.pages.Confirm.confirm', compact('confirmTransaction'));
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

        $provinsi = $request->provinsi;
        $kota = $request->kota;
        $kecamatan = $request->kecamatan;
        $kelurahan = $request->kelurahan;

        $alamat = $alamat = $provinsi . ', ' . $kota . ', ' . $kecamatan . ', ' . $kelurahan;

        $transactions = Transaction::create([
            'id_product' => $request->idProduct,
            'cust_name'  => $request->custName,
            'noHp'       => $request->noHp,
            'alamat'     => $alamat,
            'alamat_detail' => $request->detailAlamat,
            'qty'        => $qty,
            'total'      => $total,
            'status'     => 'waiting'
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
        $confirms = Transaction::findOrFail($id);
        return view('backend.pages.confirm.edit', compact('confirms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $confirms = Transaction::findOrFail($id);

        if(isset($_POST['btnaccept'])) {
           $confirms->update([
             'cust_name' => $request->custName,
             'noHp' => $request->noHp,
             'alamat' => $request->alamat,
             'alamat_detail' => $request->detailAlamat,
             'qty'  => $request->qty,
             'status' => 'Accept',
             'total'  => $request->total
           ]);

           return redirect()->route('admin.confirm.transaction')->with('success', 'Status Updated');
        } else {
            $confirms->update([
                'cust_name' => $request->custName,
                'noHp' => $request->noHp,
                'alamat' => $request->alamat,
                'alamat_detail' => $request->detailAlamat,
                'qty'  => $request->qty,
                'status' => 'Reject',
                'total'  => $request->total
              ]);
   
              return redirect()->route('admin.confirm.transaction')->with('success', 'Status Updated');   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function listUser()
    {
        $users = Transaction::selectRaw('transactions.*, products.product_name')
            ->join('products', 'products.id', '=', 'transactions.id_product')
            ->get();
        return view('backend.pages.User.List', compact('users'));
    }
}
