<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
