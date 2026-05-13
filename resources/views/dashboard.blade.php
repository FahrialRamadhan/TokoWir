<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Greeting --}}
            <div style="background:linear-gradient(135deg,#3b82f6,#6366f1); color:white; border-radius:12px; padding:28px 32px; margin-bottom:24px;">
                <h3 style="font-size:22px; font-weight:bold; margin:0 0 6px;">
                    Selamat Datang, {{ Auth::user()->name }}! 👋
                </h3>
                <p style="margin:0; opacity:0.85;">Kelola toko kamu dengan mudah melalui dashboard ini.</p>
            </div>

            {{-- Stats Cards --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px,1fr)); gap:16px; margin-bottom:24px;">

                <div style="background:white; border-radius:10px; padding:20px 24px; box-shadow:0 1px 4px rgba(0,0,0,0.08); border-left:4px solid #3b82f6;">
                    <p style="margin:0 0 4px; color:#6b7280; font-size:13px;">Total Produk</p>
                    <h2 style="margin:0; font-size:32px; font-weight:bold; color:#1d4ed8;">
                        {{ \App\Models\Product::count() }}
                    </h2>
                    <p style="margin:4px 0 0; color:#6b7280; font-size:12px;">produk terdaftar</p>
                </div>

                <div style="background:white; border-radius:10px; padding:20px 24px; box-shadow:0 1px 4px rgba(0,0,0,0.08); border-left:4px solid #10b981;">
                    <p style="margin:0 0 4px; color:#6b7280; font-size:13px;">Total Pengguna</p>
                    <h2 style="margin:0; font-size:32px; font-weight:bold; color:#059669;">
                        {{ \App\Models\User::count() }}
                    </h2>
                    <p style="margin:4px 0 0; color:#6b7280; font-size:12px;">akun terdaftar</p>
                </div>

                <div style="background:white; border-radius:10px; padding:20px 24px; box-shadow:0 1px 4px rgba(0,0,0,0.08); border-left:4px solid #f59e0b;">
                    <p style="margin:0 0 4px; color:#6b7280; font-size:13px;">Login Sebagai</p>
                    <h2 style="margin:0; font-size:18px; font-weight:bold; color:#b45309; word-break:break-all;">
                        {{ Auth::user()->email }}
                    </h2>
                    <p style="margin:4px 0 0; color:#6b7280; font-size:12px;">akun aktif</p>
                </div>

            </div>

            {{-- Quick Access --}}
            <div style="background:white; border-radius:10px; padding:24px; box-shadow:0 1px 4px rgba(0,0,0,0.08);">
                <h4 style="margin:0 0 16px; font-size:16px; font-weight:bold; color:#374151;">⚡ Akses Cepat</h4>
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <a href="{{ route('products.index') }}"
                       style="background:#3b82f6; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; font-size:14px;">
                        📦 Lihat Produk
                    </a>
                    <a href="{{ route('products.create') }}"
                       style="background:#10b981; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; font-size:14px;">
                        ➕ Tambah Produk
                    </a>
                    <a href="{{ route('profile.edit') }}"
                       style="background:#6366f1; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; font-size:14px;">
                        👤 Edit Profil
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>