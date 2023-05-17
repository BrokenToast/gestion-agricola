<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //==========================================
    //= Relaciones
    //==========================================
    /**
     * Get the temporada that owns the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function temporada(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Temporada::class);
    }
    /**
     * Get the finca that owns the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finca(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Finca::class);
    }
}
