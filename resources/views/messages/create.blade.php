<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Pesan Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('messages.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="receiver_id" class="block text-sm font-medium text-gray-700">Kepada</label>
                        <select id="receiver_id" name="receiver_id" required class="mt-1 block w-full">
                            <option value="">Pilih penerima</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('receiver_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('receiver_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subjek</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required class="mt-1 block w-full">
                        @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea name="body" id="body" rows="5" required class="mt-1 block w-full">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('messages.index') }}" class="btn btn-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
