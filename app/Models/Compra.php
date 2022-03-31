<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;
use App\Models\Producto;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['precio', 'impuesto', 'impuesto_total', 'total', 'factura_id', 'producto_id'];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
