@extends('layouts.app')

@section('template_title')
    {{ $departamento->name ?? __('Show') . " " . __('Departamento') }}
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
                            <span class="card-title">{{ __('Ver') }} Departamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('departamentos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-2 mb20">
                            <strong>ID:</strong>
                            {{ $departamento->id }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Nombre del departamento:</strong>
                            {{ $departamento->nombre }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Fecha de Creación:</strong>
                            @if($departamento->created_at)
                                {{ $departamento->created_at->format('d F Y h:i a') }}
                            @else
                                N/D
                            @endif
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Fecha de modificación:</strong>
                            @if($departamento->updated_at)
                                {{ $departamento->updated_at->format('d F Y h:i a') }}
                            @else
                                N/D
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection