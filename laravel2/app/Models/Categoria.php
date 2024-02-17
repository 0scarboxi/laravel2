<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMAny;
use App\Models\Producto;


class Categoria extends Model
{	
    use HasFactory;
	public $timestamps = false;
    protected $fillable=["id","nombre","descripcion"];
	public function producto(): HasMany{
		return $this->hasMany(Producto::class);  
	}
}