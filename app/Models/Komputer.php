<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    use HasFactory;

    protected $table = 'komputer';

    protected $fillable = [
        'id_komputer', 'kelengkapan', 'merk',
    ];

    protected $primaryKey = 'id_komputer';
}
