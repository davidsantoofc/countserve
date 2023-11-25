<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $fillable = ['id','nome','dt_nasc', 'turm_num', 'perfil', 'user_id'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
