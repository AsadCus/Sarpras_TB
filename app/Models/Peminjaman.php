<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use SoftDeletes;
    protected $table = "peminjaman";
    protected $fillable = [
        'kode_barang_id','barang_id','nama_peminjam','nama_pengembali','status_peminjam','operator_id','nama_kelas','jumlah_pinjam','status','keterangan'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])
    //     ->translatedFormat('d F Y');
    // }
    // public function getUpdatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['updated_at'])
    //     ->translatedFormat('d F Y');
    // }
    
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    // public function operator()
    // {
    //     return $this->belongsTo(Operator::class);
    // }
}
