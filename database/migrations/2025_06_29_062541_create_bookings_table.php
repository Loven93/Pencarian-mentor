<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap booking

            // Menghubungkan ke tabel users. Jika user dihapus, booking ini juga akan terhapus.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Menghubungkan ke tabel mentors. Jika mentor dihapus, booking ini juga akan terhapus.
            $table->foreignId('mentor_id')->constrained()->onDelete('cascade');
            
            // Waktu sesi yang disepakati (bisa kita kembangkan nanti)
            $table->dateTime('waktu_sesi')->nullable();
            
            // Total harga yang harus dibayar
            $table->unsignedInteger('total_harga');

            // Status pembayaran: 'pending', 'paid', 'failed', 'cancelled'
            $table->string('status')->default('pending');
            
            // ID transaksi dari payment gateway (untuk nanti)
            $table->string('payment_gateway_id')->nullable();

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
