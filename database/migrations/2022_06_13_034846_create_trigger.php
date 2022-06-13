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
        DB::unprepared('CREATE TRIGGER update_stock after INSERT ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia - NEW.jumlah_pinjam
            WHERE barang_id = NEW.barang_id;
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
        DB::unprepared('DROP TRIGGER update_stock');
    }
};
