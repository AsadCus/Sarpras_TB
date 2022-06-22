<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Stephen Hawking',
                'level' => 'Admin',
                'email' => 'admin@sarpras.com',
                'password' => bcrypt('adminsarpras'),
            ]
        ];

        $barang = [
            [
                'kode_barang' => 'A0001',
                'nama_barang' => 'Komputer dell',
                'jenis_barang' => 'Perlengkapan Komputer',
                'spesifikasi' => 'Acer Nitro 5',
                'foto_barang' => '823948324.png'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        foreach ($barang as $key => $value) {
            Barang::create($value);
        }
    }
}
