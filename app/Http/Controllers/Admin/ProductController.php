<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.pages.Product.Product', compact('products'));
    }

    public function create()
    {
        return view('backend.pages.Product.add');
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
        $image_path = $file->move('storage/product', $filename);

        // carbonara
        

        Product::create([
            'image' => $image_path,
            'product_name' => $request->productName,
            'description' => $request->description,
            'size' => $request->size,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.product')->with('success', 'Product Created');
    }

    public function edit(String $id)
    {
        $products = Product::findOrFail($id);
        return view('backend.pages.Product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        // get products dari id nya
        $products = Product::findOrFail($id);

         // check kalo gambarnya udah ada
         if($request->hasFile('image')) {
            // upload gambar baru
            // $image = $request->file('image');
            $file = $request->file('image');
            $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            $image_path = $file->move('storage/product', $filename);

            // delete gambar lama
            Storage::delete('storage/product' . $products->image);

            // update slider dengan gambar baru
            $products->update([
                'image' => $image_path,
                'product_name' => $request->productName,
                'description' => $request->description,
                'size' => $request->size,
                'stock' => $request->stock,
                'price' => $request->price,
            ]);
        } else {
            // update slider tanpa gambar
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
