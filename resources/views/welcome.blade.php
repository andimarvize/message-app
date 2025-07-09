<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Message App</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- Mengubah background menjadi lebih cerah dan teks gelap --}}
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="relative min-h-screen flex flex-col items-center justify-center py-10 px-4 sm:px-6 lg:px-8">
            {{-- Navigasi Atas --}}
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 p-6 z-10 flex space-x-4">
                    @auth
                        {{-- Jika sudah login, arahkan ke dashboard --}}
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                            Dashboard
                        </a>
                    @else
                        {{-- Jika belum login, tampilkan tombol login dan register --}}
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            {{-- Konten Utama Halaman Welcome --}}
            <div class="flex flex-col items-center justify-center text-center mt-12 sm:mt-0 bg-white p-8 rounded-lg shadow-xl">
                <div class="text-6xl font-extrabold text-blue-600 mb-6 animate-bounce">
                    Halo!
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 mb-8 leading-tight">
                    Selamat Datang di Message App
                </h1>
                <p class="text-lg sm:text-xl text-gray-700 mb-10 max-w-2xl">
                    Aplikasi ini memungkinkan Anda untuk mendaftar, login, dan mengirim pesan kepada pengguna lain.
                </p>

                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ route('login') }}" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                        Masuk Sekarang
                    </a>
                    <a href="{{ route('register') }}" class="px-8 py-3 border border-blue-600 text-blue-600 font-semibold rounded-lg shadow-lg hover:bg-blue-600 hover:text-white transition duration-300 transform hover:scale-105">
                        Daftar Akun
                    </a>
                </div>

                <div class="mt-20 text-gray-500 text-sm">
                    
                </div>
            </div>
        </div>
    </body>
</html>
