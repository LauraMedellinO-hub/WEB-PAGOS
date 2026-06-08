<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alumno</title>
    <style>
       /* Barra lateral */

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
    text-decoration: none;
}

/* Menú desplegable */
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

/* Mostrar el submenú al pasar el cursor */
.dropdown:hover > .dropdown-content {
    display: block;
}

/* Estilos para los submenús */
.dropdown .dropdown {
    position: relative;
}

.dropdown .dropdown-content {
    left: 100%;
    top: 0;
}

/* Estilos de los enlaces del submenú */
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

/* Contenido principal */
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

input[type="text"], input[type="number"] {
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

.back-link {
    text-align: center;
    margin-top: 20px;
    font-size: 16px;
}

.back-link a {
    text-decoration: none;
    color: #007bff;
}

.back-link a:hover {
    text-decoration: underline;
}

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .aprobado {
            color: green;
            font-weight: bold;
        }

        .reprobado {
            color: red;
            font-weight: bold;
        }

        .promedio-final {
            font-size: 18px;
            font-weight: bold;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }

        .generate-btn {
            text-align: center;
            margin-top: 20px;
        }
        
        
        
    </style>
</head>
<body>

  <!-- Barra lateral -->
<div class="sidebar">
    <h2>Menú</h2>
    <a href="index.html">Inicio</a>
    <a href="registro.php">Registro</a>
    <a href="ver_calificaciones.php">Ver Calificaciones</a>
    <a href="pago.php">Pagos</a>
    
<div class="dropdown">
        <a href="#">Unidad Académica</a>
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
                <a href="#">Benito Juárez</a>
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
            <h1>Buscar Alumno</h1>
            <form action="buscar_alumno.php" method="POST">
                <input type="text" name="numero_control" placeholder="Número de Control" required>
                <button type="submit">Buscar</button>
            </form>
            
            <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../conexion.php';

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $numero_control = $_POST['numero_control'];

    // Buscar datos del alumno
    $sql = $conn->prepare("SELECT * FROM alumnos WHERE numero_control = ?");
    if (!$sql) {
        die("Error en la consulta: " . $conn->error);
    }
    $sql->bind_param("s", $numero_control);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $alumno = $result->fetch_assoc();

        echo "<h2>Alumno: " . $alumno['nombre'] . " " . $alumno['apellido_paterno'] . " " . $alumno['apellido_materno'] . "</h2>";

        // Obtener calificaciones
        $sql_cal = $conn->prepare("SELECT modulo, promedio FROM calificaciones WHERE numero_control = ? ORDER BY modulo");
        if (!$sql_cal) {
            die("Error en la consulta de calificaciones: " . $conn->error);
        }
        $sql_cal->bind_param("s", $numero_control);
        $sql_cal->execute();
        $result_cal = $sql_cal->get_result();

        // Obtener estado de pagos
        $sql_pago = $conn->prepare("SELECT modulo, pago FROM calificaciones WHERE numero_control = ?");
        if (!$sql_pago) {
            die("Error en la consulta de pagos: " . $conn->error);
        }
        $sql_pago->bind_param("s", $numero_control);
        $sql_pago->execute();
        $result_pago = $sql_pago->get_result();

        // Almacenar pagos en un array
        $pago_estado = [];
        while ($row_pago = $result_pago->fetch_assoc()) {
            $pago_estado[$row_pago['modulo']] = ($row_pago['pago'] == 'Pagado') ? '✅' : '❌';
        }
        $sql_pago->close();

        // Procesar calificaciones
        $modulos = [1 => 'N/A', 2 => 'N/A', 3 => 'N/A', 4 => 'N/A', 5 => 'N/A'];
        $suma_promedios = 0;
        $contador_modulos = 0;

        while ($row = $result_cal->fetch_assoc()) {
            $modulos[$row['modulo']] = $row['promedio'];
            $suma_promedios += $row['promedio'];
            $contador_modulos++;
        }

        echo "<table>
            <tr><th>Módulo</th><th>Promedio</th><th>Pago</th></tr>";

        foreach ($modulos as $modulo => $promedio) {
            $clase = ($promedio !== 'N/A' && $promedio >= 70) ? "aprobado" : "reprobado";
            $estado_pago = isset($pago_estado[$modulo]) ? $pago_estado[$modulo] : '❌';
            echo "<tr><td>Módulo $modulo</td><td class='$clase'>$promedio</td><td>$estado_pago</td></tr>";
        }

        $promedio_final = ($contador_modulos > 0) ? $suma_promedios / $contador_modulos : 0;
        $clase_final = ($promedio_final >= 70) ? "aprobado" : "reprobado";

        echo "<tr><td class='promedio-final'><strong>Promedio Final</strong></td><td class='$clase_final'>" . number_format($promedio_final, 2) . "</td></tr>";
        echo "</table>";

        // Verificar si puede generar constancia
        if ($contador_modulos == 5 && $promedio_final >= 70) {
            echo "<div class='message success'>¡Felicidades! El alumno ha aprobado todos los módulos y puede generar la constancia de liberación.</div>";
            echo "<div class='generate-btn'>
                    <form action='generar_constancia.php' method='POST'>
                        <input type='hidden' name='numero_control' value='$numero_control'>
                        <button type='submit'>Generar Constancia</button>
                    </form>
                  </div>";
        } else {
            echo "<div class='message error'>El alumno no ha aprobado todos los módulos o no tiene todas las calificaciones registradas.</div>";
        }
    } else {
        echo "<div class='message error'>No se encontró ningún alumno con ese número de control.</div>";
    }
    $conn->close();
}
?>

        </div>
    </div>
</body>
</html>
