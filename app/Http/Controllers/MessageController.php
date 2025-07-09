<?php

namespace App\Http\Controllers;

use App\Models\Message; // Import Model Message
use App\Models\User;    // Import Model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang sedang login

class MessageController extends Controller
{
    /**
     * Menampilkan daftar pesan yang dikirim dan diterima oleh user yang sedang login.
     */
    public function index()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login

        // Pesan yang diterima oleh user ini
        $receivedMessages = Message::where('receiver_id', $user->id)
                                    ->with('sender') // Eager load sender untuk menghindari N+1 query
                                    ->latest()
                                    ->get();

        // Pesan yang dikirim oleh user ini
        $sentMessages = Message::where('sender_id', $user->id)
                                ->with('receiver') // Eager load receiver
                                ->latest()
                                ->get();

        return view('messages.index', compact('receivedMessages', 'sentMessages'));
    }

    /**
     * Menampilkan form untuk mengirim pesan baru.
     */
    public function create()
    {
        // Ambil semua user kecuali user yang sedang login
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messages.create', compact('users'));
    }

    /**
     * Menyimpan pesan baru ke database.
     */
    public function store(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'subject' => 'required',
        'body' => 'required',
    ]);

    \App\Models\Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'subject' => $request->subject,
        'content' => $request->body,
    ]);

    return redirect()->route('messages.index')->with('success', 'Pesan berhasil dikirim!');
}


    /**
     * Menampilkan detail pesan tertentu.
     */
    public function show(Message $message)
    {
        // Pastikan user yang sedang login adalah pengirim atau penerima pesan ini
        if ($message->sender_id !== Auth::id() && $message->receiver_id !== Auth::id()) {
            abort(403, 'Unauthorized action.'); // Jika bukan pengirim/penerima, tolak akses
        }

        // Tandai pesan sebagai sudah dibaca jika user yang sedang login adalah penerima
        if ($message->receiver_id === Auth::id() && is_null($message->read_at)) {
            $message->update(['read_at' => now()]);
        }

        return view('messages.show', compact('message'));
    }

    /**
     * Menghapus pesan dari database.
     */
    public function destroy(Message $message)
    {
        // Otorisasi: Pastikan hanya pengirim atau penerima yang bisa menghapus pesan ini.
        // Anda bisa memperketat ini, misal hanya pengirim yang bisa menghapus.
        if ($message->sender_id !== Auth::id() && $message->receiver_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan menghapus pesan ini.');
        }

        $message->delete(); // Hapus pesan dari database

        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus!');
    }
}