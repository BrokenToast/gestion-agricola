<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeGasto extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    //==========================================
    //= Relaciones
    //==========================================
    /**
     * Get the gasto that owns the TipoDeGasto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gasto(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Gasto::class);
    }
}
