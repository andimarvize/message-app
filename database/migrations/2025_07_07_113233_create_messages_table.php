<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // ID pesan
            // Foreign key ke tabel users untuk pengirim. onDelete('cascade') berarti jika user dihapus, pesannya juga dihapus.
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); 
            // Foreign key ke tabel users untuk penerima.
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); 
            $table->text('content'); // Isi pesan
            $table->timestamp('read_at')->nullable(); // Waktu pesan dibaca (bisa kosong)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

