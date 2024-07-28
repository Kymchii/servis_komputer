<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'id_customer', 'id_user', 'nama_customer', 'alamat_customer', 'jenis_kelamin',
    ];

    protected $primaryKey = 'id_customer';

    public function getJenisKelaminAttribute($value) {
        return $value === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
