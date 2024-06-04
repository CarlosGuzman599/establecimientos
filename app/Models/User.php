<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'tipo_users_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function localidad(){
        return $this->belongsTo(Localidades::class, 'localidad_users_id', 'id');
    }

    public function tipo_user(){
        return $this->belongsTo(TipoUser::class, 'tipo_users_id', 'id');
    }

    public function state_user(){
        return $this->belongsTo(StateUser::class, 'state_users_id', 'id');
    }
}
