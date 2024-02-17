<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'rut';
    public $incrementing = false;

    protected $fillable = [
        'rut', 'nombre', 'telefonos', 'calle', 'numero', 'ciudad', 'comuna'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
