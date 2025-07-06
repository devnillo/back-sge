<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    protected $fillable = [
        'name',
        
    ];
    protected $hidden = [
        'created_at',
        'guard_name',
        'updated_at',
        'pivot'
    ];
    
    
    

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}
