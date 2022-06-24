<?php

namespace App\Models;

use App\Models\Inventory;
use App\Models\Peminjaman;
use Illuminate\Support\Carbon; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $table = "barang";
    protected $fillable = [
        'kode_barang','nama_barang','jenis_barang', 'spesifikasi','foto_barang'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];
    
    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class);
    }
}
