<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Form {{ $title }} Produk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                <form method="POST" action="{{ $route }}">
                    @csrf
                    @if($method === 'PUT') @method('PUT') @endif

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama Produk</label>
                        <input type="text" name="name"
                               class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror"
                               value="{{ old('name', $product->name) }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Harga</label>
                        <input type="number" name="price"
                               class="w-full border rounded px-3 py-2 @error('price') border-red-500 @enderror"
                               value="{{ old('price', $product->price) }}">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2 justify-end">
                        <a href="{{ route('products.index') }}"
                           class="bg-gray-400 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>