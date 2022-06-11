<?php

namespace Database\Seeders;

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
        User::truncate();
        User::create([
            'name'=>'Admin',
            'level'=>'Admin',
            'email'=>'Admin@sarpras.com',
            'password'=>bcrypt('adminsarpras'),
            'remember_token'=>Str::random(60),
        ]);
    }
}
