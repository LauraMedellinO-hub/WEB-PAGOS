<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            width: 350px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        img {
            margin-bottom: 15px;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards 0.5s;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            transform: scale(1.05);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        .error {
            color: red;
            margin-top: 10px;
            animation: shake 0.4s ease-in-out;
        }
    </style>
    <script>
        function showLoading() {
            document.getElementById("submitBtn").style.pointerEvents = "none";
            document.getElementById("submitBtn").innerHTML = '<div class="loading"></div>';
        }
    </script>
</head>
<body>

<div class="login-container">
    <h1>Iniciar Sesión</h1>
    <form action="procesar_login.php" method="POST" onsubmit="showLoading()">
        <img src="../Imagen/login.png" alt="Logo" width="130">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit" id="submitBtn">Ingresar</button>
    </form>
    <?php if(isset($_GET['error'])) { echo "<p class='error'>".$_GET['error']."</p>"; } ?>
</div>

</body>
</html>
