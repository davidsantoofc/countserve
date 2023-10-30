<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;

    protected $table = 'cardapio';
    protected $fillable = ['id','foto','nome'];
    protected $primaryKey = 'id';
    public $incrementing = true;



    public function getImageForImg(){
        return "data:image/jpg;base64," .  base64_encode($this->foto) ;
    }




}
