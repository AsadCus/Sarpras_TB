<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang_id', 5)->references('kode_barang')->on('barangs');
            $table->string('nama_peminjam');
            $table->string('nama_pengembali')->nullable();
            $table->enum('status_peminjam',['Guru','Murid']);
            $table->string('operator_id')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->integer('jumlah_pinjam');
            $table->enum('status',['Dipinjam','Dikembalikan']);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
