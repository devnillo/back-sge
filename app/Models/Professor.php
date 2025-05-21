<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Professor extends Model implements JWTSubject
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'escola_id'
    ];

    protected $hidden = [
        'password',
    ];


    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return ['guard' => 'professor'];
    }
}