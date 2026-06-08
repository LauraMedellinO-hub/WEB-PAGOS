<?php
include '../conexion.php';

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$unidad = isset($_GET['unidad']) ? $_GET['unidad'] : '';

$query = "SELECT numero_control, nombre, apellido_paterno, apellido_materno FROM alumnos WHERE unidad_academica = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Error en la consulta: " . $conn->error);
}

$stmt->bind_param("s", $unidad);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Calificaciones</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .sidebar {
            background-color: #007bff;
            color: white;
            width: 250px;
            padding: 20px;
            height: 100%;
            box-sizing: border-box;
            position: fixed;
        }

        .sidebar h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #0056b3;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        input[type="text"], input[type="number"], select {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 12px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        #toggleUnidad4 {
            background-color: red;
            margin-top: 5px;
        }

        #toggleUnidad4:hover {
            background-color: darkred;
        }.sidebar {
    background-color: #007bff;
    color: white;
    width: 250px;
    padding: 20px;
    height: 100%;
    box-sizing: border-box;
    position: fixed;
}

.sidebar h2 {
    color: white;
    font-size: 24px;
    margin-bottom: 30px;
}

.sidebar a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    display: block;
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 5px;
}

.sidebar a:hover {
    background-color: #0056b3;
    text-decoration: none;
}

/* Menú desplegable */
.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #007bff;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    width: 200px;
    border-radius: 5px;
    left: 100%;
    top: 0;
}

.dropdown:hover > .dropdown-content {
    display: block;
}

.dropdown .dropdown {
    position: relative;
}

.dropdown .dropdown-content {
    left: 100%;
    top: 0;
}


.dropdown-content a {
    padding: 10px;
    display: block;
    color: white;
    background-color: #007bff;
    text-decoration: none;
    border-radius: 5px;
}

.dropdown-content a:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>

<!-- Barra lateral -->
<div class="sidebar">
    <h2>Menú</h2>
    <a href="index.html">Inicio</a>
    <a href="registro.php">Registro</a>
    <a href="ver_calificaciones.php">Ver Calificaciones</a>
    <a href="pago.php">Pagos</a>

    <div class="dropdown">
        <a href="#">Unidad Académica</a>
        <div class="dropdown-content">
            <div class="dropdown">
                <a href="#">Chicontepec</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=Chicontepec">Asignar Calificaciones</a>
                    <a href="buscar_alumno.php?unidad=Chicontepec">Buscar Promedio del Alumno</a>
                    <a href="ver_alumnos.php?unidad=Chicontepec">Ver alumnos</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#">Benito Juárez</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=BenitoJuarez">Asignar Calificaciones</a>
                    <a href="buscar_alumno.php?unidad=BenitoJuarez">Buscar Promedio del Alumno</a>
                    <a href="ver_alumnos.php?unidad=BenitoJuarez">Ver alumnos</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#">Huayacocotla</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=Huayacocotla">Asignar Calificaciones</a>
                    <a href="buscar_alumno.php?unidad=Huayacocotla">Buscar Promedio del Alumno</a>
                    <a href="ver_alumnos.php?unidad=Huayacocotla">Ver alumnos</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#">Tlacolula</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=Tlacolula">Asignar Calificaciones</a>
                    <a href="buscar_alumno.php?unidad=Tlacolula">Buscar Promedio del Alumno</a>
                    <a href="ver_alumnos.php?unidad=Tlacolula">Ver alumnos</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<div class="main-content">
    <div class="container">
        <h1>Asignar Calificaciones</h1>
        <form action="guardar_calificaciones.php" method="POST">
            <label for="numero_control">Selecciona un alumno:</label>
            <select name="numero_control" required>
                <option value="">-- Selecciona --</option>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row['numero_control'] ?>">
                        <?= $row['nombre'] . ' ' . $row['apellido_paterno'] . ' ' . $row['apellido_materno'] ?> 
                        (<?= $row['numero_control'] ?>)
                    </option>
                <?php endwhile; ?>
            </select>

            <input type="hidden" name="unidad" value="<?= htmlspecialchars($unidad) ?>">
            <input type="number" name="modulo" placeholder="Módulo" required>
            <input type="number" step="0.1" name="unidad1" placeholder="Unidad 1" required>
            <input type="number" step="0.1" name="unidad2" placeholder="Unidad 2" required>
            <input type="number" step="0.1" name="unidad3" placeholder="Unidad 3" required>

            <div id="unidad4-container">
                <input type="number" step="0.1" name="unidad4" id="unidad4" placeholder="Unidad 4">
                <button type="button" id="toggleUnidad4">Eliminar Unidad 4</button>
            </div>

            <button type="submit">Guardar Calificaciones</button>
        </form>
    </div>
</div>

<script>
document.getElementById("toggleUnidad4").addEventListener("click", function () {
    let unidad4Input = document.getElementById("unidad4");

    if (unidad4Input.style.display === "none") {
        unidad4Input.style.display = "block";
        this.textContent = "Eliminar unidad";
        unidad4Input.value = "";
    } else {
        unidad4Input.style.display = "none";
        this.textContent = "Agregar Unidad ";
        unidad4Input.value = "";
    }
});
</script>

</body>
</html> 