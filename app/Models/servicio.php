<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'NOM_SERV', 'DESC_SERV','PREC_SERV', 'FOTO_SERV',
    ];
}
