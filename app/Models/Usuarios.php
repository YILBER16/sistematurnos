<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = "usuarios";

    protected $fillable = [
        'id_documento',
        'nom_usuario',
        'edad',
        'genero',
    ];
    protected $primaryKey='id_documento';

}
