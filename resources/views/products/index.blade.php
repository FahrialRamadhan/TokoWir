<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div style="background:#d1fae5; color:#065f46; padding:12px 16px; border-radius:6px; margin-bottom:16px;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <h3 style="font-size:18px; font-weight:bold;">Data Produk</h3>
                <a href="{{ route('products.create') }}"
                   style="background:#3b82f6; color:white; padding:8px 16px; border-radius:6px; text-decoration:none;">
                    + Tambah Produk
                </a>
            </div>

            <div style="background:white; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.1); overflow:hidden;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead style="background:#f3f4f6;">
                        <tr>
                            <th style="padding:12px 16px; text-align:left; border-bottom:1px solid #e5e7eb;">No</th>
                            <th style="padding:12px 16px; text-align:left; border-bottom:1px solid #e5e7eb;">Nama</th>
                            <th style="padding:12px 16px; text-align:left; border-bottom:1px solid #e5e7eb;">Harga</th>
                            <th style="padding:12px 16px; text-align:center; border-bottom:1px solid #e5e7eb;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $i => $product)
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:12px 16px;">{{ $i + 1 }}</td>
                            <td style="padding:12px 16px;">{{ $product->name }}</td>
                            <td style="padding:12px 16px;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td style="padding:12px 16px; text-align:center;">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   style="background:#f59e0b; color:white; padding:6px 14px; border-radius:4px; text-decoration:none; margin-right:6px;">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                      style="display:inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="background:#ef4444; color:white; padding:6px 14px; border-radius:4px; border:none; cursor:pointer;">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding:24px; text-align:center; color:#9ca3af;">
                                Belum ada produk. Klik "+ Tambah Produk" untuk menambahkan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>