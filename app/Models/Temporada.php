<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'observaciones',
        'usuario_id',
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
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];
    //==========================================
    //= Relaciones
    //==========================================
    /**
     * Get the gasto that owns the Temporada
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gasto(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Gasto::class);
    }
    /**
     * Get the ganancia that owns the Temporada
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ganancia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Ganancia::class);
    }
    /**
     * Get the usuario associated with the Temporada
     *
     *
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    //==========================================
    //= Accesors
    //==========================================
    protected function comiezoFinalTemporada(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->fecha_inicio->format('Y-m-d') . ' - ' . $this->fecha_fin->format('Y-m-d') . (($this->fecha_fin) ? '(Finalizada)' : '(No finalizada)');
            },
        );
    }
}
