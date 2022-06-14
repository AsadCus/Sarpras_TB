<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operator extends Model
{
    protected $table = "operator";
    protected $fillable = [
        'nama_op'
    ];

    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class);
    }
}
