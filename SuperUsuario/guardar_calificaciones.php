<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_control = $_POST['numero_control'];
    $modulo = $_POST['modulo'];

    // Obtener calificaciones si existen, si no, asignar NULL
    $unidad1 = isset($_POST['unidad1']) && $_POST['unidad1'] !== "" ? (float)$_POST['unidad1'] : null;
    $unidad2 = isset($_POST['unidad2']) && $_POST['unidad2'] !== "" ? (float)$_POST['unidad2'] : null;
    $unidad3 = isset($_POST['unidad3']) && $_POST['unidad3'] !== "" ? (float)$_POST['unidad3'] : null;
    $unidad4 = isset($_POST['unidad4']) && $_POST['unidad4'] !== "" ? (float)$_POST['unidad4'] : null;
    $unidad5 = isset($_POST['unidad5']) && $_POST['unidad5'] !== "" ? (float)$_POST['unidad5'] : null;

    // Verificar si ya existe la calificación para el mismo número de control y módulo
    $sql_check = "SELECT COUNT(*) AS total FROM calificaciones WHERE numero_control = ? AND modulo = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("si", $numero_control, $modulo);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row = $result_check->fetch_assoc();

    if ($row['total'] > 0) {
        echo "<script>alert('Error: La calificación para este número de control y módulo ya existe.'); window.history.back();</script>";
    } else {
        // Calcular promedio solo con las unidades que tienen calificación
        $calificaciones = array_filter([$unidad1, $unidad2, $unidad3, $unidad4, $unidad5], function ($nota) {
            return $nota !== null;
        });

        $promedio = count($calificaciones) > 0 ? array_sum($calificaciones) / count($calificaciones) : 0;

        // Preparar la consulta para insertar
        $sql_insert = "INSERT INTO calificaciones (numero_control, modulo, unidad1, unidad2, unidad3, unidad4, unidad5, promedio) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param(
            "siiiiidd", 
            $numero_control, 
            $modulo, 
            $unidad1, 
            $unidad2, 
            $unidad3, 
            $unidad4, 
            $unidad5, 
            $promedio
        );

        if ($stmt_insert->execute()) {
            echo "<script>alert('Calificación guardada exitosamente.'); window.location.href='asignar_calificaciones.php';</script>";
        } else {
            echo "<script>alert('Error al guardar la calificación.'); window.history.back();</script>";
        }
    }

    // Cerrar conexiones
    $stmt_check->close();
    $stmt_insert->close();
    $conn->close();
}
?>
