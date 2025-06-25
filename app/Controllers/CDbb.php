<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CDbb extends BaseController

{
    public function testconexion(): void
    {
        $datosdeconexion = \config\Database::connect();
        if ($datosdeconexion->connect()) {
            echo 'establecida la conexion';
        } else {
            echo 'error de la conexion';
        }
    }
}