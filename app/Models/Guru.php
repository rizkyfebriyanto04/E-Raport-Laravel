<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru_m';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'namalengkap',
    ];
}
