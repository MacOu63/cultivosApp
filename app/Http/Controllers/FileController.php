<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function show($filename)
    {
        // Verificar si el archivo existe en la carpeta public
        $path = public_path($filename);

        if (!file_exists($path)) {
            abort(404);
        }

        $mimeType = mime_content_type($path);

        return response()->file($path, [
            'Content-Type' => $mimeType,
        ]);
    }
}
