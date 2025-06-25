<?php

namespace App\Models;

use CodeIgniter\Model;

class ImcModel extends Model
{
    protected $table = 'registros';
    protected $allowedFields = ['nombre', 'peso', 'estatura', 'imc', 'clasificacion', 'fecha_registro'];
    public $timestamps = false;
}