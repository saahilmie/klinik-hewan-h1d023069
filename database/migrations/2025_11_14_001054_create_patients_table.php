<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->enum('jenis_hewan', ['Kucing', 'Anjing', 'Kelinci', 'Burung', 'Hamster', 'Lainnya']);
            $table->integer('umur'); // dalam bulan
            $table->string('nama_pemilik');
            $table->string('no_telepon');
            $table->text('diagnosa');
            $table->date('tanggal_check_in');
            $table->date('tanggal_check_out')->nullable();
            $table->enum('status', ['Dirawat', 'Sembuh', 'Mati'])->default('Dirawat');
            $table->date('tanggal_kematian')->nullable();
            $table->decimal('biaya_perawatan', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
