@extends('layouts.app')

@section('template_title')
    {{ $anunciante->titulo ?? __('Show') . " " . __('Anunciante') }}
@endsection

@section('content')

    <style>
        .card-title{
            color: #fff;
        }

        .card-body {
            background-color: #333; /* Fondo oscuro */
            color: #fff; /* Texto blanco */
        }

        input, select, textarea {
            background-color: #555; /* Fondo claro para inputs */
            color: #fff; /* Texto blanco */
            border: 1px solid #777;
            padding: 10px;
            border-radius: 4px;
        }

        button {
            background-color: #444; /* Fondo oscuro del botón */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #666; /* Fondo más claro al hacer hover */
        }

        .card {
            background-color: #222; /* Fondo oscuro de la tarjeta */
            border: 1px solid #444; /* Borde sutil */
        }
    </style>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Anunciante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('anunciantes.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Titulo') }}:</strong>
                            <br>
                            {{ $anunciante->titulo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Subtitulo') }}:</strong>
                            <br>
                            {{ $anunciante->subtitulo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Contenido') }}:</strong>
                            <br>
                            {{ $anunciante->contenido }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Imagen') }}:</strong>
                            <br>
                            <img src="{{ asset('storage/' . $anunciante->image) }}" alt="Imagen del anunciante" width="400">
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Link') }}:</strong>
                            <br>
                            {{ $anunciante->link }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Added By') }}:</strong>
                            <br>
                            {{ $anunciante->usuario->nombre_usuario ?? 'N/A' }} {{ $anunciante->usuario->apellido_usuario ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection