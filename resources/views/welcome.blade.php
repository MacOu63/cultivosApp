@extends('layouts.template')



@section('content')
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos
$sql = "SELECT symbol, number_of_operations, amount_negotiated, monto_negocio_soles, precio_final FROM stock_data";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}

$datos = array();
while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico con Datos desde MySQL</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            cursor: pointer;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
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

    <table id="dataTable">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Number of Operations</th>
                <th>Amount Negotiated</th>
                <th>Monto Negociado en Soles</th>
                <th>Precio Final</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($datos)): ?>
                <?php foreach ($datos as $index => $dato): ?>
                    <tr data-index="<?= $index ?>">
                        <td><?= $dato['symbol'] ?></td>
                        <td><?= $dato['number_of_operations'] ?></td>
                        <td><?= $dato['amount_negotiated'] ?></td>
                        <td><?= $dato['monto_negocio_soles'] ?></td>
                        <td><?= $dato['precio_final'] ?></td>
                    </tr>
                    <tr class="grafico-container" id="graficoContainer-<?= $index ?>" style="display:none;">
                        <td colspan="5">
                            <canvas id="miGrafico-<?= $index ?>"></canvas>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay datos disponibles</td>
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
                    // Mostrar gráfico si está oculto
                    graficoContainer.style.display = 'table-row';
                    if (!graficos[index]) {
                        crearGrafico(index, datos[index]);
                    }
                } else {
                    // Ocultar gráfico si está visible
                    graficoContainer.style.display = 'none';
                }
            }
        });

        function crearGrafico(index, row) {
            const ctx = document.getElementById('miGrafico-' + index).getContext('2d');
            graficos[index] = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Number of Operations', 'Amount Negotiated', 'Monto Negociado en Soles', 'Precio Final'],
                    datasets: [{
                        label: 'Datos',
                        data: [row.number_of_operations, row.amount_negotiated, row.monto_negocio_soles, row.precio_final],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
@endsection