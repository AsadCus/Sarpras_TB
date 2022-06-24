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
        DB::unprepared('CREATE TRIGGER update_stock after INSERT ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia - NEW.jumlah_pinjam
            WHERE kode_barang_id = NEW.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER delete_stock after UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia + OLD.jumlah_pinjam
            WHERE kode_barang_id = OLD.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER update_pinjam after INSERT ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_pinjam = jumlah_pinjam + NEW.jumlah_pinjam
            WHERE kode_barang_id = NEW.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER update_pinjam_update after UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_pinjam = jumlah_pinjam - OLD.jumlah_pinjam
            WHERE kode_barang_id = OLD.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER update_plus after UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia - NEW.jumlah_pinjam
            WHERE kode_barang_id = NEW.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER before_update before UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_tersedia = jumlah_tersedia + OLD.jumlah_pinjam
            WHERE kode_barang_id = OLD.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER before_updatepinjam before UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_pinjam = jumlah_pinjam - OLD.jumlah_pinjam
            WHERE kode_barang_id = OLD.kode_barang_id;
            END'
        );

        DB::unprepared('CREATE TRIGGER after_updatepinjam after UPDATE ON peminjaman
            FOR EACH ROW
            BEGIN UPDATE inventori set
            jumlah_pinjam = jumlah_pinjam + NEW.jumlah_pinjam
            WHERE kode_barang_id = OLD.kode_barang_id;
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
        DB::unprepared('DROP TRIGGER delete_stock');
        DB::unprepared('DROP TRIGGER update_pinjam');
        DB::unprepared('DROP TRIGGER update_pinjam_delete');
        DB::unprepared('DROP TRIGGER update_plus');
        DB::unprepared('DROP TRIGGER before_update');
        DB::unprepared('DROP TRIGGER before_updatepinjam');
        DB::unprepared('DROP TRIGGER after_updatepinjam');
    }
};
