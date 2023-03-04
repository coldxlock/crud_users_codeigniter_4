<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Testes extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Praticando CI versao 4',
            'testes' => 'muito bom'
        ];

        return view('Testes/index', $data);
    }

    public function new() 
    {
        echo 'Esse é mais um teste do controller';
    }
}
