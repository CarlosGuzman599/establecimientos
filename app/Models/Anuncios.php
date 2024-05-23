<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anuncios extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'users_id',
        'establecimientos_id',
        'categorias_id',
        'localidades_id',
        'tiempos_id',
        'img',
        'descripcion',
        'direccion',
        'lat',
        'lng',
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

    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class, 'establecimientos_id', 'id');
    }

    public function tiempos(){
        return $this->belongsTo(Tiempos::class, 'tiempos_id', 'id');
    }

    public function localidad(){
        return $this->belongsTo(Localidades::class, 'localidades_id', 'id');
    }
}
