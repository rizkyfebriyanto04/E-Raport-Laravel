<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'hasilraport_t';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'objectmatpelfk',
        'objectsiswafk',
        'nilai',
        'ket',
        // 'objectsemesterfk'
    ];
}
