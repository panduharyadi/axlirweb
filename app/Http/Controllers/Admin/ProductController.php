<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductFile;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
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
        return view('backend.pages.Product.Product', compact('products', 'transactions', 'chartData'));
    }

    public function create()
    {
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
        return view('backend.pages.Product.add', compact('transactions', 'chartData'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'product_name' => $request->productName,
            'description' => $request->description,
            'size' => $request->size,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        if ($request->hasFile('file')) {
            $allowedExtension = ['jpg', 'jpeg', 'png', 'webp', '3gp', 'mp4', 'mkv', 'mov'];
            $files = $request->file('file');

            foreach ($files as $file) {
                $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedExtension);
               
                if ($check) {
                    $image_path = $file->move('storage/product', $filename);
                    
                    ProductFile::create([
                        'product_id'        => $product->id,
                        'path_file'         => $image_path
                    ]);
                }
            }
        }

        return redirect()->route('admin.product')->with('success', 'Product Created');
    }

    public function edit(String $id)
    {
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
        $products = Product::findOrFail($id);
        return view('backend.pages.Product.edit', compact('products', 'chartData'));
    }

    public function update(Request $request, $id)
    {
        // get products dari id nya
        $products = Product::findOrFail($id);

        // check kalo gambarnya udah ada
        if ($request->hasFile('image')) {
            // upload gambar baru
            // $file = $request->file('image');
            // $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            // $image_path = $file->move('storage/product', $filename);

            $allowedExtension = ['jpg', 'jpeg', 'png', 'webp', '3gp', 'mp4', 'mkv', 'mov'];
            $files = $request->file('file');

            foreach ($files as $file) {
                $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedExtension);
               
                if ($check) {
                    $image_path = $file->move('storage/product', $filename);
                    
                    $productFile = ProductFile::create([
                        'product_id'        => $products->id,
                        'path_file'         => $image_path
                    ]);
                }
            }

            // delete gambar lama
            Storage::delete('storage/product' . $products->image);

            // update product dengan gambar baru
            $products->update([
                'image' => $productFile,
                'product_name' => $request->productName,
                'description' => $request->description,
                'size' => $request->size,
                'stock' => $request->stock,
                'price' => $request->price,
            ]);
        } else {
            // update product tanpa gambar
            $products->update([
                'product_name' => $request->productName,
                'description' => $request->description,
                'size' => $request->size,
                'stock' => $request->stock,
                'price' => $request->price,
            ]);
        }

        return redirect()->route('admin.product')->with('success', 'Product updated');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('admin.product')->with('success', 'Product Deleted!');
    }
}
