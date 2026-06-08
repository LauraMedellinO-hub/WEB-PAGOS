<?php
session_start();
include '../conexion.php'; // Asegúrate de que este archivo tiene la conexión a tu base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['rol'] = $user['rol'];

        if ($user['rol'] == 'administrador') {
            header("Location: admin.php");
        } else {
            header("Location: superusuario.php");
        }
        exit();
    } else {
        header("Location: login.php?error=Usuario o contraseña incorrectos");
        exit();
    }
}
?>
