<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            {{-- Tombol Kembali (Back Arrow) --}}
            <a href="{{ route('products.index') }}" class="text-gray-400 hover:text-black transition-colors" title="Kembali">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-black leading-tight tracking-tight">
                {{ $title }} Data Produk & Variant
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ $route }}">
                @csrf
                @if($method === 'PUT') @method('PUT') @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Bagian Kiri: Form Data Produk Induk --}}
                    <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm h-fit">
                        <h3 class="text-lg font-semibold border-b pb-3 mb-5">Data Produk</h3>
                        
                        {{-- Input Nama Produk --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                            <input type="text" name="name"
                                   class="w-full border border-gray-300 rounded-md px-4 py-2.5 text-black placeholder-gray-400 focus:border-black focus:ring-0 transition-colors @error('name') border-red-500 focus:border-red-500 @enderror"
                                   value="{{ old('name', $product->name ?? '') }}"
                                   placeholder="Masukkan nama produk">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Input Harga --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Utama</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm font-medium">Rp</span>
                                </div>
                                <input type="number" name="price"
                                       class="w-full border border-gray-300 rounded-md pl-11 px-4 py-2.5 text-black placeholder-gray-400 focus:border-black focus:ring-0 transition-colors @error('price') border-red-500 focus:border-red-500 @enderror"
                                       value="{{ old('price', $product->price ?? '') }}"
                                       placeholder="0">
                            </div>
                            @error('price')
                                <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Kanan: Form Data Variant (Opsional) --}}
                    {{-- Note: Jika form ini untuk edit dan sudah punya variant, logikanya akan lebih kompleks (butuh looping variant lama) --}}
                    {{-- Form di bawah ini didesain simpel untuk mencontohkan input 1 varian saat membuat produk baru --}}
                    <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
                        <h3 class="text-lg font-semibold border-b pb-3 mb-5">Spesifikasi Variant (Opsional)</h3>
                        
                        <div class="mb-4">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Nama Variant (ex: Warna/Tipe)</label>
                            <input type="text" name="variant_name" class="w-full border-gray-300 rounded text-sm focus:border-black focus:ring-0" value="{{ old('variant_name') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                            <textarea name="variant_description" rows="2" class="w-full border-gray-300 rounded text-sm focus:border-black focus:ring-0">{{ old('variant_description') }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-xs font-medium text-gray-700 mb-1">Processor</label>
                                <input type="text" name="variant_processor" class="w-full border-gray-300 rounded text-sm focus:border-black focus:ring-0" value="{{ old('variant_processor') }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-xs font-medium text-gray-700 mb-1">Memory (RAM)</label>
                                <input type="text" name="variant_memory" class="w-full border-gray-300 rounded text-sm focus:border-black focus:ring-0" value="{{ old('variant_memory') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Storage (Penyimpanan)</label>
                            <input type="text" name="variant_storage" class="w-full border-gray-300 rounded text-sm focus:border-black focus:ring-0" value="{{ old('variant_storage') }}">
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex justify-end gap-3 bg-white p-5 border border-gray-200 rounded-lg shadow-sm">
                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center justify-center px-6 py-2.5 bg-white border border-gray-300 text-black text-sm font-medium rounded hover:border-black hover:bg-gray-50 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-black border border-black text-white text-sm font-medium rounded hover:bg-gray-800 transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>