<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_update before UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia + OLD.jumlah_pinjam
            WHERE barang_id = OLD.barang_id;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER before_update');
    }
};
