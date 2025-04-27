<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = [
        'dependencia',
        'name',
        'email',
        'password',
        'admin_id',
        'code',
    ];

    protected $hidden = [
        'password',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
