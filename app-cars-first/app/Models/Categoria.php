<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'estado', 'prioridad'];

    public function cars()
    {
        return $this->hasMany(Car::class, 'categoria_id');
    }
}


