<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['cantidad', 'producto_id', 'venta_id'];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
