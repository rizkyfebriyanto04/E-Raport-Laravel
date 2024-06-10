<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa_m';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'namalengkap',
        'nisn',
        'ttl',
        'jk',
        'agama',
        'alamat',
        'nohp',
    ];
}
