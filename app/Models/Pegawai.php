<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'id_pegawai', 'id_user', 'nama_pegawai', 'alamat_pegawai', 'jenis_kelamin', 'status',
    ];

    protected $primaryKey = 'id_pegawai';

    public function getJenisKelaminAttribute($value) {
        return $value === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
