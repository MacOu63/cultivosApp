<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_tesis";

$cultivo = $_GET['cultivo'];
$departamento = $_GET['departamento'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos históricos
$sql = "SELECT precio, fecha FROM precios
        WHERE cultivos_id = (SELECT id FROM cultivos WHERE nombre = ?) 
        AND departamentos_id = (SELECT id FROM departamentos WHERE nombre = ?)
        ORDER BY fecha ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $cultivo, $departamento);
$stmt->execute();

$result = $stmt->get_result();
$datos = array();
while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
}

// Cerrar la conexión
$conn->close();

echo json_encode($datos);
?>