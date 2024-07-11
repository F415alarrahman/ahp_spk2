<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    protected $table = 'kriterias';

    public function matrik()
    {
        return $this->hasMany(matrik::class, 'matrik_id');
    }
}
