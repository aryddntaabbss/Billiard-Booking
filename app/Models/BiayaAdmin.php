<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaAdmin extends Model
{
    protected $table = 'biaya_admin';

    protected $fillable = [
        'nominal'
    ];
}
