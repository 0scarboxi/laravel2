<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto  extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=["id","nombre","precio","stock"];
    public function categoria(): BelongsTo{
        return $this->belongsTo(Categoria::class);
    }
    public function proveedor(): BelongsTo{
        return $this->belongsTo(Proveedor::class);
    }
}