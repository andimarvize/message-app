<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kotak Pesan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold">Daftar Pesan</h3>
                        <a href="{{ route('messages.create') }}" class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                            Kirim Pesan Baru
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Bagian Pesan Diterima --}}
                        <div>
                            <h4 class="text-xl font-semibold mb-4 border-b pb-2">Pesan Diterima</h4>
                            @if ($receivedMessages->isEmpty())
                                <p class="text-gray-600 dark:text-gray-400">Tidak ada pesan masuk.</p>
                            @else
                                <div class="space-y-4">
                                    @foreach ($receivedMessages as $message)
                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm border {{ $message->read_at ? 'border-gray-300' : 'border-blue-400 font-semibold' }}">
                                            <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                                <span>Dari: <span class="font-medium text-gray-800 dark:text-gray-200">{{ $message->sender->name }}</span></span>
                                                <span>{{ $message->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-gray-800 dark:text-gray-200 mb-3">{{ Str::limit($message->content, 100) }}</p>
                                            <div class="flex justify-between items-center">
                                                <a href="{{ route('messages.show', $message->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Lihat Detail</a>
                                                {{-- Tombol Hapus untuk pesan yang diterima --}}
                                                {{-- Hanya tampilkan tombol hapus jika user yang login adalah penerima --}}
                                                @if ($message->receiver_id === Auth::id())
                                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm ml-2">Hapus</button>
                                                    </form>
                                                @endif
                                                @if (!$message->read_at)
                                                    <span class="text-xs text-blue-500">Baru</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Bagian Pesan Terkirim --}}
                        <div>
                            <h4 class="text-xl font-semibold mb-4 border-b pb-2">Pesan Terkirim</h4>
                            @if ($sentMessages->isEmpty())
                                <p class="text-gray-600 dark:text-gray-400">Tidak ada pesan terkirim.</p>
                            @else
                                <div class="space-y-4">
                                    @foreach ($sentMessages as $message)
                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm border border-gray-300">
                                            <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                                <span>Kepada: <span class="font-medium text-gray-800 dark:text-gray-200">{{ $message->receiver->name }}</span></span>
                                                <span>{{ $message->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-gray-800 dark:text-gray-200 mb-3">{{ Str::limit($message->content, 100) }}</p>
                                            <div class="flex justify-between items-center">
                                                <a href="{{ route('messages.show', $message->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Lihat Detail</a>
                                                {{-- Tombol Hapus untuk pesan yang dikirim --}}
                                                {{-- Hanya tampilkan tombol hapus jika user yang login adalah pengirim --}}
                                                @if ($message->sender_id === Auth::id())
                                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm ml-2">Hapus</button>
                                                    </form>
                                                @endif
                                                @if ($message->read_at)
                                                    <span class="text-xs text-green-500">Sudah Dibaca</span>
                                                @else
                                                    <span class="text-xs text-yellow-500">Belum Dibaca</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

