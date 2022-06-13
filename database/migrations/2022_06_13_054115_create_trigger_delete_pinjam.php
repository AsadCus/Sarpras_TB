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
       DB::unprepared('CREATE TRIGGER update_pinjam_delete after DELETE ON peminjaman
        FOR EACH ROW
        BEGIN UPDATE inventori set
        jumlah_pinjam = jumlah_pinjam - OLD.jumlah_pinjam
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
        DB::unprepared('DROP TRIGGER update_pinjam_delete');
    }
};
