<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuestos extends Model
{
    use HasFactory;
    protected $fillable = [
        'NOM_REP', 'DESC_REP','PREC_REP', 'EXIS_REP', 'FOTO_REP',
    ];
}
