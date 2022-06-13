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
       
        DB::unprepared('CREATE TRIGGER update_pinjam after INSERT ON peminjaman
        FOR EACH ROW
        BEGIN UPDATE inventori set
        jumlah_pinjam = jumlah_pinjam + NEW.jumlah_pinjam
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
        DB::unprepared('DROP TRIGGER update_pinjam');
    }
};
