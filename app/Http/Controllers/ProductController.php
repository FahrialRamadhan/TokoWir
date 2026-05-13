<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.form', [
            'title'   => 'Tambah',
            'product' => new Product(),
            'route'   => route('products.store'),
            'method'  => 'POST',
        ]);
    }

    public function store(Request $request)
{
    // 1. Validasi input produk utama
    $validated = $request->validate([
        'name' => 'required|min:4',
        'price' => 'required|integer|min:1000',
    ]);

    // 2. Simpan data produk ke database
    $product = Product::create($validated);

    // 3. Simpan data varian JIKA user mengisi kolom nama varian di form
    if ($request->filled('variant_name')) {
        $product->variants()->create([
            'name' => $request->variant_name,
            'description' => $request->variant_description ?? '-',
            'processor' => $request->variant_processor ?? '-',
            'memory' => $request->variant_memory ?? '-',
            'storage' => $request->variant_storage ?? '-',
        ]);
    }

    return redirect()->route('products.index')->with('success', 'Produk & Variant berhasil ditambahkan');
    
}
    public function edit(Product $product) {
        return view('products.form', [
            'title'   => 'Edit',
            'product' => $product,
            'route'   => route('products.update', $product),
            'method'  => 'PUT',
        ]);
    }

    public function update(Request $request, Product $product) {
        $validated = $request->validate([
            'name'  => 'required|min:4',
            'price' => 'required|integer|min:1000',
        ]);
        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product) {
        // 1. Hapus semua data variant yang berelasi dengan produk ini dulu
        $product->variants()->delete();

        // 2. Setelah data anaknya bersih, baru hapus produk induknya
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk beserta variannya berhasil dihapus');
    }
}