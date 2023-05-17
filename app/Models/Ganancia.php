<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganancia extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comprador',
        'precio_tonelada',
        'cantidad',
        'fecha',
        'finca_id',
        'temporada_id'
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
    protected $casts = [
        'fecha' => 'datetime',
    ];
    //==========================================
    //= Relaciones
    //==========================================
    /**
     * Get the fincas associated with the Ganancia
     *
     * @return
     */
    public function finca()
    {
        return $this->belongsTo(Finca::class);
    }
    /**
     * Get the temporada associated with the Ganancia
     *
     * @return
     */
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
