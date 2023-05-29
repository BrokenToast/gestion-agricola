<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'descripcion',
        'cantidad',
        'fecha',
        'tipo_de_gasto_id',
        'finca_id',
        'temporada_id',
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
        'fecha' => 'datetime'
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
    /**
     * Get the tipo_de_gasto associated with the Ganancia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDeGasto(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TipoDeGasto::class);
    }
    //==========================================
    //= Scope
    //==========================================
    public function scopeFiltrarPorDescripcion(Builder $query, $descripcion)
    {
        $query->where('descripcion', 'like', '%' . $descripcion . '%');
    }
}
