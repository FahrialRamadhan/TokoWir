<x-app-layout>
    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Greeting Section --}}
            <div class="bg-white border border-gray-200 rounded-lg p-8 mb-8">
                <h3 class="text-2xl font-semibold text-black mb-2 tracking-tight">
                    Selamat Datang, {{ Auth::user()->name }}.
                </h3>
                <p class="text-gray-500 font-light">Kelola operasional toko Anda dengan efisien melalui panel ini.</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                {{-- Card 1 --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:border-black transition-colors duration-300 group">
                    <p class="text-sm font-medium text-gray-500 mb-2 group-hover:text-black transition-colors">Total Produk</p>
                    <h2 class="text-4xl font-bold text-black tracking-tight mb-1">
                        {{ \App\Models\Product::count() }}
                    </h2>
                    <p class="text-xs text-gray-400">Produk terdaftar di sistem</p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:border-black transition-colors duration-300 group">
                    <p class="text-sm font-medium text-gray-500 mb-2 group-hover:text-black transition-colors">Total Pengguna</p>
                    <h2 class="text-4xl font-bold text-black tracking-tight mb-1">
                        {{ \App\Models\User::count() }}
                    </h2>
                    <p class="text-xs text-gray-400">Akun pengguna terdaftar</p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:border-black transition-colors duration-300 group">
                    <p class="text-sm font-medium text-gray-500 mb-2 group-hover:text-black transition-colors">Sesi Aktif</p>
                    <h2 class="text-lg font-semibold text-black truncate mb-1" title="{{ Auth::user()->email }}">
                        {{ Auth::user()->email }}
                    </h2>
                    <p class="text-xs text-gray-400">Login sebagai administrator</p>
                </div>

            </div>

            {{-- Quick Access --}}
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <h4 class="text-lg font-semibold text-black tracking-tight">Akses Cepat</h4>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    {{-- Button: Lihat Produk --}}
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white border border-gray-300 text-black text-sm font-medium rounded hover:border-black hover:bg-gray-50 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Katalog Produk
                    </a>
                    
                    {{-- Button: Tambah Produk (Primary - Black) --}}
                    <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-black border border-black text-white text-sm font-medium rounded hover:bg-gray-800 transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Data Baru
                    </a>
                    
                    {{-- Button: Edit Profil --}}
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white border border-gray-300 text-black text-sm font-medium rounded hover:border-black hover:bg-gray-50 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Pengaturan Akun
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>