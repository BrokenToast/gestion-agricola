<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finca extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parcela',
        'poligono',
        'municipio',
        'provincia',
        'hectarias',
        'usuario_id'
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
     * Get the usuario that owns the Finca
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Usuario::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function temporada(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Temporada::class, 'finca_temporada_cultivo');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cultivo(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Cultivo::class, 'finca_temporada_cultivo');
    }
    /**
     * Get the ganancias that owns the Finca
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ganancias(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ganancia::class);
    }
    //==========================================
    //= Scopes
    //==========================================
    public function scopeFiltrarPorBaja(Builder $query, $baja = true)
    {
        if ($baja) {
            $query->onlyTrashed();
        }
    }
}
