<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Provinsi;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::selectRaw('transactions.*, products.product_name, products.size, products.price')
            ->join('products', 'products.id', '=', 'transactions.id_product')
            ->get();

        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }
        
        return view('backend.pages.Transaction.Transaction', compact(['transactions', 'chartData']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store from user/customer
     */
    public function store(Request $request)
    {
        $product = Product::find($request->idProduct);

        $price = $product->price; 
        $qty = intval($request->qty);

        $total = $price * $qty;

        $provinsi = $request->provinsi;
        $kota = $request->kota;
        $kecamatan = $request->kecamatan;
        $kelurahan = $request->kelurahan;

        $alamat = $alamat = $provinsi . ', ' . $kota . ', ' . $kecamatan . ', ' . $kelurahan;

        // validasi no hp
        $noHp = $request->noHp;
        if(substr($noHp, 0, 1) == '0') {
            $noHp = '62' . substr($noHp, 1);
        }

        $transactions = Transaction::create([
            'id_product' => $request->idProduct,
            'cust_name'  => $request->custName,
            'noHp'       => $noHp,
            'alamat'     => $alamat,
            'alamat_detail' => $request->detailAlamat,
            'size'       => $request->size,
            'price'      => $request->price,
            'qty'        => $qty,
            'directBy'   => 'web',
            'total'      => $total,
            'status'     => 'waiting',
        ]);

        return redirect()->back();
    }

    public function transactionEcommerce()
    {
        $products = Product::all();
        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }
        return view('backend.pages.Transaction.add', compact('products', 'transactions', 'chartData'));
    }

    // store Admin Manual
    public function storeEcommerce(Request $request)
    {
        $product = Product::find($request->idProduct);

        $product->stock -= intval($request->qty);
        $product->save();

        $price = $request->price; 
        $qty = intval($request->qty);

        $total = $price * $qty;

        $provinsi = $request->provinsi;
        $kota = $request->kota;
        $kecamatan = $request->kecamatan;
        $kelurahan = $request->kelurahan;

        $alamat = $alamat = 'Prov ' . ' ' . $provinsi . ', ' . $kota . ', ' . $kecamatan . ', ' . $kelurahan;

        // validasi no hp
        $noHp = $request->noHp;
        if(substr($noHp, 0, 1) == '0') {
            $noHp = '62' . substr($noHp, 1);
        }

        $transactions = Transaction::create([
            'id_product' => $request->idProduct,
            'cust_name'  => $request->custName,
            'noHp'       => $noHp,
            'alamat'     => $alamat,
            'alamat_detail' => $request->detailAlamat,
            'size'       => $request->size,
            'price'      => $request->price,
            'qty'        => $qty,
            'directBy'   => $request->ecommerce,
            'total'      => $total,
            'status'     => 'waiting',
        ]);

        return redirect()->route('admin.transaction')->with('success', 'Transaction created!');
    }

    /**
     * Method Invoice
     */
    public function show(string $id)
    {
        $findInvoice = Transaction::findOrFail($id);
        $getProduct = Product::where('id', $findInvoice->id_product)->get();

        // ini biar sales chart ga error
        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }
        return view('backend.pages.Transaction.Invoice', compact(['findInvoice', 'getProduct', 'transactions', 'chartData']));
    }

    // method cetak Resi
    public function getResi(string $id)
    {
        $findResi = Transaction::findOrFail($id);
        $getProduct = Product::all();
        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }

        return view('backend.pages.Transaction.Resi', compact(['findResi', 'getProduct', 'transactions', 'chartData']));
    }

    // method retur produk
    public function retur($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->status = 'Retur';
        $transaction->save();

        // ngembaliin stock yang dibeli 
        $product = Product::findOrFail($transaction->id_product);
        $product->stock += $transaction->qty;
        $product->save();

        return redirect()->route('admin.transaction')->with('success', 'Retur confirmed');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $confirms = Transaction::findOrFail($id);
        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }
        return view('backend.pages.Transaction.updateStatus', compact('confirms', 'transactions', 'chartData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $confirms = Transaction::findOrFail($id);

        if($request->has('btnaccept')) {
           $confirms->update([
             'cust_name' => $request->custName,
             'noHp' => $request->noHp,
             'alamat' => $request->alamat,
             'alamat_detail' => $request->detailAlamat,
             'qty'  => $request->qty,
             'status' => 'Accept',
             'total'  => $request->total
           ]);

        // ngurangin stock ketika status accept
        $product = Product::findOrFail($confirms->id_product);
        $product->stock -= $confirms->qty;
        $product->save();

        return redirect()->route('admin.transaction')->with('success', 'Status Updated');

        } else if($request->has('btnreject')){
            $confirms->update([
                'cust_name' => $request->custName,
                'noHp' => $request->noHp,
                'alamat' => $request->alamat,
                'alamat_detail' => $request->detailAlamat,
                'qty'  => $request->qty,
                'status' => 'Reject',
                'total'  => $request->total
              ]);
   
              return redirect()->route('admin.transaction')->with('success', 'Status Updated');   
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
        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total;
            }
        }
        return view('backend.pages.User.List', compact('users', 'transactions', 'chartData'));
    }
}
