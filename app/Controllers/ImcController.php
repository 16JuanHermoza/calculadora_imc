<?php

namespace App\Controllers;

use App\Models\ImcModel;
use CodeIgniter\Controller;

class ImcController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function calcular()
    {
        $nombre = $this->request->getPost('nombre');
        $peso = (float)$this->request->getPost('peso');
        $estatura = (float)$this->request->getPost('estatura');

        // Cálculo del IMC
        $imc = $peso / ($estatura * $estatura);

        // Clasificación
        if ($imc < 18.5) {
            $clasificacion = 'Bajo peso';
        } elseif ($imc < 25.0) {
            $clasificacion = 'Normal';
        } elseif ($imc < 30.0) {
            $clasificacion = 'Sobrepeso';
        } else {
            $clasificacion = 'Obesidad';
        }

        // Guardar en la base de datos
        $model = new ImcModel();
        $model->insert([
            'nombre' => $nombre,
            'peso' => $peso,
            'estatura' => $estatura,
            'imc' => $imc,
            'clasificacion' => $clasificacion
        ]);

        // Pasar datos a la vista
        return view('welcome_message', [
            'resultado' => [
                'nombre' => $nombre,
                'imc' => number_format($imc, 2),
                'clasificacion' => $clasificacion
            ]
        ]);
    }
}