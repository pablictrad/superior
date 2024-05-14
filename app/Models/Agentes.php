<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentes extends Model
{
    use HasFactory;
    protected $table = 'tb_agentes';
    protected $primaryKey = 'idAgente';

}
