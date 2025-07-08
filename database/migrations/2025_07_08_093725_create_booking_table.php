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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('meja_id')->constrained('meja')->onDelete('cascade');
            $table->date('tanggal_booking');
            $table->time('jam_booking');
            $table->integer('total_harga');
            $table->integer('biaya_admin');
            $table->integer('total_pembayaran');
            $table->enum('payment_method', ['midtrans_direct', 'midtrans_by_admin']);
            $table->string('payment_link')->nullable();
            $table->enum('status', ['Pending', 'Lunas', 'Gagal'])->default('Pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
