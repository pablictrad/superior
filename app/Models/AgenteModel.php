<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenteModel extends Model
{
    use HasFactory;
    protected $table='tb_desglose_agentes';
    protected $primaryKey = 'idDesgloseAgente';
}
