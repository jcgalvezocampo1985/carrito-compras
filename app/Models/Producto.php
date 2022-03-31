<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Compra;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'impuesto', 'stock_actual', 'stock_minimo', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'producto_id');
    }
}
