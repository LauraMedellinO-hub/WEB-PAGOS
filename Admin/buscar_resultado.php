<?php
include '../conexion.php';

$carrera = $_GET['carrera'];
$semestre = $_GET['semestre'];
$grupo = $_GET['grupo'];
$modalidad = $_GET['modalidad'];

$sql = "SELECT * FROM alumnos WHERE carrera LIKE '%$carrera%' AND semestre LIKE '%$semestre%' AND grupo LIKE '%$grupo%' AND modalidad LIKE '%$modalidad%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['nombre']} {$row['apellidos']} - {$row['numero_control']}</p>";
    }
} else {
    echo "No se encontraron resultados.";
}
$conn->close();
?>