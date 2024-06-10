<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel_m';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'matapelajaran',
        'nilaikkm',
    ];
}
