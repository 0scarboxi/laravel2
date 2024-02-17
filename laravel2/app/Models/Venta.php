<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['fecha', 'cliente_rut', 'descuento', 'monto_final'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function detalles()
    {
    return $this->hasMany(Detalle::class);
    }
}
