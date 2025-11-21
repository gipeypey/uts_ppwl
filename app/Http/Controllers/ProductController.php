<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
class ProductController extends Controller
{
/**
* Menampilkan daftar produk
*/
public function index(): View
{
return view('products.index');
}
/**
* Menampilkan form tambah produk
*/
public function create(): View
{
return view('products.create');
}
/**
* Menyimpan produk baru
*/
public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'stok'      => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $image = $request->file('image');
        // Simpan ke folder: storage/app/public/products
        $image->storeAs('public/products', $image->hashName());

        Product::create([
            'nama'      => $request->nama,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'deskripsi' => $request->deskripsi,
            'image'     => $image->hashName(), // Kita simpan nama filenya saja
        ]);

        return redirect()->route('products.index')->with('success', 'Produk Berhasil Disimpan!');
    }
/**
* Menampilkan form edit produk
*/
public function edit(Product $product): View
{
return view('products.edit');
}
/**
* Mengupdate produk
*/
public function update(Request $request, Product $product)
{ }
/**
* Menghapus produk
*/
public function destroy(Product $product)
{ }
}