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
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Business Casual - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
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
<body style="background-image: url('assets/img/berserk.jpg');">
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">A Free Bootstrap Business Theme</span>
            <span class="site-heading-lower">Business Casual</span>
        </h1>
    </header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="inicio.php">Inicio</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.html">Acerca de</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.html">Noticias</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.html">Contactanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro.jpg" alt="..." />
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">Fresh Coffee</span>
                        <span class="section-heading-lower">Worth Drinking</span>
                    </h2>
                    <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!</p>
                    <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Our Promise</span>
                            <span class="section-heading-lower">To You</span>
                        </h2>
                        <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h1>Negociación Diaria</h1>

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
                        <td><?= htmlspecialchars($dato['symbol']) ?></td>
                        <td><?= htmlspecialchars($dato['number_of_operations']) ?></td>
                        <td><?= htmlspecialchars($dato['amount_negotiated']) ?></td>
                        <td><?= htmlspecialchars($dato['monto_negocio_soles']) ?></td>
                        <td><?= htmlspecialchars($dato['precio_final']) ?></td>
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
