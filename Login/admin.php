<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'administrador') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            text-align: center;
        }

        .navbar {
            background-color: #007bff;
            padding: 15px;
            color: white;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar span {
            font-weight: bold;
        }

        .container {
            background: white;
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-bottom: 20px;
        }

        img {
            margin-top: 10px;
            border-radius: 10px;
        }

        .enter-btn {
            display: inline-block;
            background: #28a745;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
            margin-top: 20px;
            font-weight: bold;
        }

        .enter-btn:hover {
            background: #218838;
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span>Panel de Administrador</span>
        <a href="logout.php" class="enter-btn">Cerrar Sesión</a>
    </div>

    <div class="container">
        <h1>Bienvenido, Administrador</h1>
        <p>Esta es la página del administrador donde puedes gestionar el sistema.</p>
        <img src="../Imagen/x.png" alt="Logo" width="130">
        <br>
        <a href="../Admin/index.html" class="enter-btn">ENTER</a>
    </div>

</body>
</html>
