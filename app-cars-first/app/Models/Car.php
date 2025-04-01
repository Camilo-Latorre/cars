<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_car'; 
    public $incrementing = true; 
    protected $keyType = 'int';

    // Columnas que pueden llenarse masivamente
    protected $fillable = [
        'car_make', 'car_model', 'car_year', 'car_price', 'car_status', 'categoria_id', 'codigo_barras'
    ];
    // Relación con el modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}


