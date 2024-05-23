<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Localidades;

class Establecimiento extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'users_id',
        'categorias_id',
        'localidades_id',
        'logo',
        'protection',
        'delivery',
        'direccion',
        'colonia',
        'lat',
        'lng',
        'telefono',
        'descripcion',
        'horario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function localidad(){
        return $this->belongsTo(Localidades::class, 'localidades_id', 'id');
    }

    public function categoria(){
        return $this->belongsTo(Categorias::class, 'categorias_id', 'id');
    }
}
