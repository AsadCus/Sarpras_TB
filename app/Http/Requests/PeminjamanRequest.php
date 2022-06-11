<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'barang_id' => 'required',
            'nama_peminjam' => 'required',
            'status_peminjam' => 'required',
            'nama_kelas' => 'required',
            'jumlah_pinjam' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ];
    }
}
