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
                'name' => 'Admin 1',
                'level' => 'Admin',
                'email' => 'admin1@sarpras.com',
                'password' => bcrypt('adminsarpras1'),
            ],
            [
                'name' => 'Admin 2',
                'level' => 'Admin',
                'email' => 'admin2@sarpras.com',
                'password' => bcrypt('adminsarpras2'),
            ],
            [
                'name' => 'Admin 3',
                'level' => 'Admin',
                'email' => 'admin3@sarpras.com',
                'password' => bcrypt('adminsarpras3'),
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
