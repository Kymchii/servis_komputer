<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    protected $table = 'keluhan';

    protected $fillable = [
        'id_keluhan', 'nama_keluhan', 'ongkos', 'id_komputer', 'id_customer', 'id_pegawai'
    ];

    protected $primaryKey = 'id_keluhan';
}
