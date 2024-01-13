<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as RoleSpatie;

class Role extends RoleSpatie
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'guard_name',
    ];

    protected $attributes = [
        'id',
        'name',
        'guard_name',
    ];

    // protected $attributes = [
    //     'name',
    //     'guard_name',
    // ];

    // protected $hidden = [
    //     'name',
    //     'guard_name',
    // ];
}
