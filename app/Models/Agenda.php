<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    protected $fillable = ['cardapio_id', 'pessoa_id', 'status'];
    protected $primaryKey = 'cardapio_id';

    public $incrementing = true;

    public $timestamps = false;

    public function pessoa(){
        return $this->belongsTo(Pessoa::class , 'pessoa_id', 'id');
    }

    public function cardapio(){
        return $this->hasMany(Cardapio::class, 'cardapio_id', 'id');
    }
}
