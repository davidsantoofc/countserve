<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $fillable = ['id','nome','dt_nasc', 'tur_num', 'perfil'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
