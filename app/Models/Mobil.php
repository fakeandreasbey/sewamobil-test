<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';

    public $primaryKey = 'id';

    protected $fillable = [
        'merek',
        'model',
        'no_plat',
        'tarif',
        'status_aktif',
    ];



}
