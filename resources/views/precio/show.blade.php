@extends('layouts.app')

@section('template_title')
    {{ $precio->name ?? __('Show') . " " . __('Precio') }}
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
                            <span class="card-title">{{ __('Ver') }} Precio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('precios.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-2 mb20">
                            <strong>Precio:</strong>
                            {{ $precio->precio }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Nombre del cultivo:</strong>
                            {{ $precio->cultivo->nombre }}  <!-- Uso correcto de la relación -->
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Nombre del departamento:</strong>
                            {{ $precio->departamento->nombre }}  <!-- Uso correcto de la relación -->
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Fecha de Creación:</strong>
                            @if($precio->created_at)
                                {{ $precio->created_at->format('d F Y h:i a') }}
                            @else
                                N/D
                            @endif
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Fecha de modificación:</strong>
                            @if($precio->updated_at)
                                {{ $precio->updated_at->format('d F Y h:i a') }}
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