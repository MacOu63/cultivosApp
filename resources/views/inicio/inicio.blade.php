@extends('layouts.home')

@section('anunpubli')
<section class="page-section clearfix">
    <div id="introCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores del carrusel -->
        <div class="carousel-indicators">
            @foreach ($anunciantes as $index => $anunciante)
                <button type="button" data-bs-target="#introCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <!-- Elementos del carrusel -->
        <div class="carousel-inner">
            @foreach ($anunciantes as $index => $anunciante)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="intro">
                            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('storage/' . $anunciante->image) }}" alt="Imagen del Anunciante" />
                            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">{{ $anunciante->subtitulo }}</span>
                                    <span class="section-heading-lower">{{ $anunciante->titulo }}</span>
                                </h2>
                                <p class="mb-3">{{ $anunciante->contenido }}</p>
                                <div class="intro-button mx-auto">
                                    <a class="btn btn-primary btn-xl" href="{{ $anunciante->fuente }}">Visítanos!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controles del carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#introCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#introCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@endsection

@section('content')
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_tesis";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los filtros seleccionados
$departamento = $_GET['departamento'] ?? '';
$cultivo = $_GET['cultivo'] ?? '';

// Consulta para obtener los datos con los filtros aplicados
$sql = "SELECT p1.precio, p1.fecha, c.nombre AS cultivo, d.nombre AS departamento
        FROM precios p1
        INNER JOIN (
            SELECT cultivos_id, departamentos_id, MAX(fecha) AS max_fecha
            FROM precios
            GROUP BY cultivos_id, departamentos_id
        ) p2 ON p1.cultivos_id = p2.cultivos_id AND p1.departamentos_id = p2.departamentos_id AND p1.fecha = p2.max_fecha
        INNER JOIN cultivos c ON p1.cultivos_id = c.id
        INNER JOIN departamentos d ON p1.departamentos_id = d.id
        WHERE 1=1";

if (!empty($departamento)) {
    $sql .= " AND p1.departamentos_id = " . $conn->real_escape_string($departamento);
}

if (!empty($cultivo)) {
    $sql .= " AND p1.cultivos_id = " . $conn->real_escape_string($cultivo);
}

// Limitar a 7 registros
$sql .= " LIMIT 7";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}

$datos = array();
while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico con Datos desde MySQL</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; /* Mejor experiencia en dispositivos táctiles */
        }

        table {
            cursor: pointer;
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #333; /* Borde más oscuro y grueso */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
            border: 2px solid #333; /* Borde más oscuro y grueso */
        }

        .selected {
            background-color: #f0f0f0;
        }

        .grafico-container {
            display: none;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        canvas {
            width: 100% !important;
            height: 200px !important; /* Ajustar la altura del gráfico */
        }
    </style>
</head>
<body>
    <!--<h1>Negociación Diaria</h1> */-->
    <form method="GET" class="mb-4">
            <label for="departamento">Filtrar por Departamento:</label>
            <select name="departamento" id="departamento" class="form-select mb-2" style="background-color:rgb(255, 255, 255,0.6);">
                <option value="">Todos</option>
                <?php
                // Consultar departamentos
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sqlDepartamentos = "SELECT id, nombre FROM departamentos";
                $resultDepartamentos = $conn->query($sqlDepartamentos);
                while ($row = $resultDepartamentos->fetch_assoc()) {
                    $selected = ($departamento == $row['id']) ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <label for="cultivo">Filtrar por Cultivo:</label>
            <select name="cultivo" id="cultivo" class="form-select mb-2" style="background-color:rgb(255, 255, 255,0.6);">
                <option value="">Todos</option>
                <?php
                // Consultar cultivos
                $sqlCultivos = "SELECT id, nombre FROM cultivos";
                $resultCultivos = $conn->query($sqlCultivos);
                while ($row = $resultCultivos->fetch_assoc()) {
                    $selected = ($cultivo == $row['id']) ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <button type="submit" class="btn btn-primary w-100">Filtrar</button>

    </form>

    <table id="dataTable">
        <thead>
            <tr>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Cultivo</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($datos)): ?>
                <?php foreach ($datos as $index => $dato): ?>
                    <tr data-index="<?= $index ?>">
                        <td><?= $dato['precio'] ?></td>
                        <td><?= $dato['fecha'] ?></td>
                        <td><?= $dato['cultivo'] ?></td>
                        <td><?= $dato['departamento'] ?></td>
                    </tr>
                    <tr class="grafico-container" id="graficoContainer-<?= $index ?>" style="display:none;">
                        <td colspan="4">
                            <canvas id="miGrafico-<?= $index ?>"></canvas>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay datos disponibles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        const datos = <?= json_encode($datos) ?>;
        let graficos = {};

        document.getElementById('dataTable').addEventListener('click', function(event) {
            const target = event.target.closest('tr');
            if (target && target.parentNode.tagName === 'TBODY' && !target.classList.contains('grafico-container')) {
                const index = target.getAttribute('data-index');
                const graficoContainer = document.getElementById('graficoContainer-' + index);

                if (graficoContainer.style.display === 'none') {
                    graficoContainer.style.display = 'table-row';
                    if (!graficos[index]) {
                        crearGrafico(index, datos[index]);
                    }
                } else {
                    graficoContainer.style.display = 'none';
                }
            }
        });

        function crearGrafico(index, row) {
            const ctx = document.getElementById('miGrafico-' + index).getContext('2d');

            // Hacer una llamada AJAX para obtener los datos históricos del cultivo y departamento seleccionado
            fetch(`obtener_datos_historicos.php?cultivo=${row.cultivo}&departamento=${row.departamento}`)
                .then(response => response.json())
                .then(datosFiltrados => {
                    const precios = datosFiltrados.map(d => d.precio);
                    const fechas = datosFiltrados.map(d => d.fecha);

                    graficos[index] = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: fechas,
                            datasets: [{
                                label: row.cultivo + ' (' + row.departamento + ')',
                                data: precios,
                                borderWidth: 2,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgba(75, 192, 192, 1)',
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: false
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error al obtener datos históricos:', error);
                });
        }
    </script>
</body>
</html>
@endsection