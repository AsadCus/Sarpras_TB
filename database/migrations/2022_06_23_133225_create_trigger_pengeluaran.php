<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER after_pengeluaran after INSERT ON barang_keluars
            FOR EACH ROW
            BEGIN UPDATE inventori set
            stock = stock - NEW.jumlah_keluar
            WHERE barang_id = NEW.barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER after_pengeluaran_2 after INSERT ON barang_keluars
        FOR EACH ROW
        BEGIN UPDATE inventori set
        jumlah_tersedia = jumlah_tersedia - NEW.jumlah_keluar
        WHERE barang_id = NEW.barang_id;
        END'
        );

        DB::unprepared('CREATE TRIGGER after_delete_pengeluaran after DELETE ON barang_keluars
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia + OLD.jumlah_keluar
            WHERE barang_id = OLD.barang_id;
            END'
        );
        DB::unprepared('CREATE TRIGGER after_delete_pengeluaran_2 after DELETE ON barang_keluars
            FOR EACH ROW
            BEGIN UPDATE inventori set
            stock = stock + OLD.jumlah_keluar
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
        DB::unprepared('DROP TRIGGER after_pengeluaran');
        DB::unprepared('DROP TRIGGER after_pengeluaran_2');
        DB::unprepared('DROP TRIGGER after_delete_pengeluaran');
        DB::unprepared('DROP TRIGGER after_delete_pengeluaran_2');
    }
};
