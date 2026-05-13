<x-app-layout>
    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="mb-6 px-4 py-3 bg-white border border-black text-black text-sm font-medium rounded-md flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header Title & Add Button --}}
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-black tracking-tight">Data Produk</h3>
                <a href="{{ route('products.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-black border border-black text-white text-sm font-medium rounded hover:bg-gray-800 transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Data
                </a>
            </div>

            {{-- Table Container --}}
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-3 px-6 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="py-3 px-6 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="py-3 px-6 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            {{-- Tambahan Header Variant --}}
                            <th class="py-3 px-6 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider">Variant</th>
                            <th class="py-3 px-6 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($products as $i => $product)
                        <tr class="hover:bg-gray-50 transition-colors duration-200 align-top">
                            <td class="py-4 px-6 text-sm text-gray-500">
                                {{ $i + 1 }}
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-black">
                                {{ $product->name }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            {{-- Tambahan Data Variant --}}
                            <td class="py-4 px-6 text-sm text-gray-600">
                                @if($product->variants->isNotEmpty())
                                    <ul class="space-y-3">
                                        @foreach($product->variants as $var)
                                            <li class="bg-white p-3 rounded border border-gray-200 shadow-sm">
                                                <span class="font-semibold text-black block mb-1">{{ $var->name }}</span>
                                                <ul class="text-xs space-y-1 text-gray-500">
                                                    <li><span class="font-medium text-gray-700">Desc:</span> {{ $var->description }}</li>
                                                    <li><span class="font-medium text-gray-700">Proc:</span> {{ $var->processor }}</li>
                                                    <li><span class="font-medium text-gray-700">RAM:</span> {{ $var->memory }}</li>
                                                    <li><span class="font-medium text-gray-700">Strg:</span> {{ $var->storage }}</li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-400 italic">Tidak ada variant</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-sm text-center">
                                <div class="flex justify-center items-start gap-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-300 text-black text-xs font-medium rounded hover:border-black transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    {{-- Delete Button --}}
                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-300 text-black text-xs font-medium rounded hover:border-black hover:text-black transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            {{-- Ubah colspan menjadi 5 karena ada tambahan 1 kolom baru --}}
                            <td colspan="5" class="py-12 px-6 text-center text-sm text-gray-500">
                                Belum ada data produk. Klik <span class="font-medium text-black">Tambah Data</span> untuk memulai.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>