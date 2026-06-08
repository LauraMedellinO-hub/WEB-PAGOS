<?php
include '../conexion.php';

$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$numero_control = $_POST['numero_control'];
$unidad_academica = $_POST['unidad_academica'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
$grupo = $_POST['grupo'];
$modalidad = $_POST['modalidad'];
$modulo = $_POST['modulo']; 

$sql = "INSERT INTO alumnos (nombre, apellido_paterno, apellido_materno, numero_control, unidad_academica, carrera, semestre, grupo, modalidad, modulo) 
        VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$numero_control', '$unidad_academica', '$carrera', '$semestre', '$grupo', '$modalidad', '$modulo')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Alumno registrado correctamente.');
            window.history.back();
          </script>";
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            window.history.back();
          </script>";
}

$conn->close();
?>


