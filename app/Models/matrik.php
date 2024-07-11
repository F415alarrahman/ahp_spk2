<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matrik extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_a', 'kriteria_b', 'nilai', 'kriteria_id'
    ];

    protected $table = 'matriks';

    public function kriteria_a()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_a');
    }

    public function kriteria_b()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_b');
    }
}
