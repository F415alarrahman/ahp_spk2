<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field_place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'jarak',
        'jenis_lapangan',
        'fasilitas_lapangan',
        'jumlah_pemain',
        'telephone',
        'created_at',
        'updated_at'
    ];
}
