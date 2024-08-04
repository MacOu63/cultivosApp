<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use Illuminate\Http\Request;

class MercadoController extends Controller
{
    public function index()
    {
        $cultivos = Cultivo::paginate();
        return view('welcome', compact('cultivos'));
    }
}

