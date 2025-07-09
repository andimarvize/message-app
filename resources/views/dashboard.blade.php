<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    {{-- Mengubah background menjadi lebih cerah --}}
    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h1>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Anda berhasil login ke Message App.</span>
                    </div>

                    <div class="mt-6 text-gray-700 dark:text-gray-300 text-lg">
                        <p>Ini adalah halaman utama Anda. Dari sini, Anda bisa mulai mengirim dan menerima pesan.</p>
                        <p class="mt-2">Gunakan navigasi di atas atau tombol di bawah untuk berinteraksi dengan aplikasi.</p>
                    </div>
                </div>

                <div class="bg-gray-100 dark:bg-gray-700 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    {{-- Card Fitur: Kotak Pesan --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-blue-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Kotak Pesan Anda</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Lihat semua pesan yang Anda terima dan kirim.
                        </p>
                        <a href="{{ route('messages.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                            Lihat Pesan
                        </a>
                    </div>

                    {{-- Card Fitur: Kirim Pesan --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-green-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Kirim Pesan Baru</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Mulai percakapan baru dengan pengguna lain.
                        </p>
                        <a href="{{ route('messages.create') }}" class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300">
                            Kirim Pesan
                        </a>
                    </div>

                    {{-- Card Fitur: Manajemen Profil --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-purple-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Manajemen Profil</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Perbarui informasi akun atau ubah password Anda.
                        </p>
                        <a href="{{ route('profile.edit') }}" class="mt-4 inline-block px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition duration-300">
                            Edit Profil
                        </a>
                    </div>

                    {{-- Card Fitur: Logout --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-red-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Keluar Aplikasi</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Amankan akun Anda dengan keluar dari sesi.
                        </p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-300">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
