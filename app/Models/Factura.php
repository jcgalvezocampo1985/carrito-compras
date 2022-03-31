<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Compra;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'factura_id');
    }
}
