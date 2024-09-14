@extends('layouts.app')

@section('template_title')
    Noticias
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Barra de título -->
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd;">
                    <div>
                        <button class="btn btn-primary btn-sm" title="Crear Nuevo" data-placement="left" onclick="window.location.href='{{ route('noticias.create') }}'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ __('NUEVO REGISTRO') }}
                        </button>
                    </div>
                    
                    <!-- Selector de resultados -->
                    <form action="{{ route('noticias.index') }}" method="GET" id="results-form">
                        <div class="form-container">
                            <span>{{ __('Resultados') }}</span>
                            &nbsp;
                            <select name="results_per_page" class="form-control form-control-sm results-select" onchange="document.getElementById('results-form').submit();">
                                <option value="10" {{ request('results_per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('results_per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('results_per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                    </form>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tabla de precios -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 12%;">Acciones</th>
                                    <th style="width: 6%;">ID</th>
                                    <th style="width: 16%;">Título</th>
                                    <th style="width: 17%;">SubTítulo</th>
                                    <th style="width: 30%;">Contenido</th>
                                    <th style="width: 10%;">Imagen</th>
                                    <th style="width: 6%;">Link</th>
                                    <th style="width: 3%;">Editor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($noticias as $noticia)
                                <tr>
                                    <td class="d-flex justify-content-start actions-btns">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-sm" style="background-color: #4CAF50; color: white;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                            Ver
                                        </a>

                                        <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-sm btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                            Editar
                                        </a>

                                        <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $noticia->titulo }}</td>
                                    <td>{{ $noticia->subtitulo }}</td>
                                    <td>
                                        @php
                                            // Obtener el contenido completo
                                            $contenido = $noticia->contenido;

                                            // Buscar la posición del primer punto
                                            $posicion_punto = strpos($contenido, '.');

                                            // Si hay un punto, cortar el texto hasta ese punto
                                            if ($posicion_punto !== false) {
                                                $contenido_cortado = substr($contenido, 0, $posicion_punto + 1); // Incluir el punto
                                            } else {
                                                // Si no hay punto, mostrar todo el contenido
                                                $contenido_cortado = $contenido;
                                            }
                                        @endphp
                                        {{ $contenido_cortado }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $noticia->image) }}" alt="Imagen de la noticia" width="100">
                                    </td>
                                    <td><a href="{{ $noticia->link }}" target="_blank">Enlace</a></td>
                                    <td>{{ $noticia->usuario->nombre_usuario ?? 'N/A' }} {{ $noticia->usuario->apellido_usuario ?? '' }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {!! $noticias->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos en línea -->
<style>
    .card-header {
        background-color: #f8f9fa;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table thead th {
        background-color: #343a40;
        color: #fff;
        text-align: center;
    }

    /* Estilos específicos para los botones en la columna de acciones */
    .actions-btns .btn {
        margin-right: 20px; /* Aumenta el margen a la derecha */
    }

    /*.btn-info, .btn-warning, .btn-danger {
        margin-right: 5px;
    }*/

    .input-group .form-control {
        border-radius: 0;
        width: 220px;
        height:34px;
    }

    .btn-outline-secondary {
        border-radius: 0;
    }

    .select-results {
        margin-left: 10px;
    }

    .form-container {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    /* Media query para pantallas pequeñas (celulares) */
    @media (max-width: 576px) {
        .card-header, .card-body {
            padding: 10px;
            width: 100%;
        }

        .table thead th, .table tbody td {
            font-size: 12px;
            padding: 8px;
        }

        /*
        .actions-btns .btn {
            margin-right: 5px; /* Reducir margen entre botones */
            /*padding: 4px 8px; /* Reducir tamaño de botones /
            font-size: 12px;
        }*/

        .input-group .form-control, .input-group-append .btn {
            width: 100%;
            font-size: 8px;
        }

        .alert {
            font-size: 12px;
            padding: 8px;
        }

        .select-results select {
            font-size: 12px;
        }

        .col-8 {
            width: 235px;
            margin-left: 10px;
            margin-bottom:10px;
        }

        .col-4{
            width: 60%;
            margin-left:10px;
        }

        .form-container {
            flex-direction: column;
            align-items: flex-start;
            margin-left: 6px;
        }

        /*
        .form-container span {
            margin-bottom: 0.5rem;
        }*/

        .results-select {
            width: 60%; /* Hacer el select ocupar todo el ancho disponible en pantallas pequeñas */
            margin-left: 13px;
            margin-top: -10px;
        }
    }

    /* Media query para pantallas medianas (tablets) */
    @media (min-width: 577px) and (max-width: 768px) {
        .table thead th, .table tbody td {
            font-size: 14px;
        }

        .actions-btns .btn {
            margin-right: 10px;
            padding: 6px 12px;
        }

        .input-group .form-control, .input-group-append .btn {
            width: 100%;
            font-size: 14px;
        }

        .alert {
            font-size: 14px;
            padding: 10px;
        }
    }

        /* Media query para pantallas medianas (tablets) */
        @media (max-width: 1068px) {
        .table thead th, .table tbody td {
            font-size: 14px;
            width: 10%;
        }

        .actions-btns .btn {
            margin-right: 10px;
            padding: 6px 12px;
        }

        .input-group .form-control, .input-group-append .btn {
            width: 100%;
            font-size: 14px;
        }

        .alert {
            font-size: 14px;
            padding: 10px;
        }

        .form-container {
            flex-direction: column;
            align-items: flex-start;
            margin-left: 6px;
        }

        /*
        .form-container span {
            margin-bottom: 0.5rem;
        }*/

        .results-select {
            width: 60%; /* Hacer el select ocupar todo el ancho disponible en pantallas pequeñas */
            margin-left: 13px;
            margin-top: -10px;
        }

        .col-8 {
            width: 235px;
            margin-left: 10px;
            margin-bottom:10px;
        }

        .col-4{
            width: 60%;
            margin-left:10px;
        }

    }

    /*
    .input-group .btn {
        width: 800px; /* Ajusta el valor a tu preferencia 
    }*/
</style>

<!-- Scripts en la misma sección -->
<script>
    $(document).ready(function() {
        // Inicia DataTable si es necesario
        $('.table').DataTable();
    });
</script>

<script>
    document.getElementById('search-input').addEventListener('input', function (event) {
        // Filtrar caracteres que no sean letras
        this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '');
    });
</script>
@endsection

@section('extra-scripts')
<!-- Incluye los estilos y scripts de Bootstrap y Font Awesome si no están ya en tu layout -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
@endsection