<?php
include '../conexion.php'; // Conexión a la BD

// Verifica si se pasó la unidad académica por URL
if (isset($_GET['unidad'])) {
    $unidad_academica = $_GET['unidad'];

    // Consulta para obtener alumnos filtrados por unidad académica
    $sql = "SELECT * FROM alumnos WHERE unidad_academica = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $unidad_academica);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "<script>alert('Unidad académica no especificada.'); window.history.back();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Alumnos - <?php echo htmlspecialchars($unidad_academica); ?></title>
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

/* Mostrar el submenú al pasar el cursor */
.dropdown:hover > .dropdown-content {
    display: block;
}

/* Estilos para los submenús */
.dropdown .dropdown {
    position: relative;
}

.dropdown .dropdown-content {
    left: 100%;
    top: 0;
}

/* Estilos de los enlaces del submenú */
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

.main-content {
    margin-left: 270px;
    padding: 20px;
    width: calc(100% - 270px); 
    box-sizing: border-box;
    min-height: 100vh; 
    overflow-y: auto;
}

.container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    padding: 30px;
    max-width: 1100px;
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centra el contenido */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
    font-size: 16px;
}

th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e2e6ea;
    transition: 0.3s;
}

/* Botón de regreso con mejor estilo */
.back-button {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 18px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    transition: 0.3s;
}

.back-button:hover {
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
                    <a href="ver_alumnos.php?unidad=Chicontepec">Ver alumnos</a>

                </div>
            </div>
            <div class="dropdown">
                <a href="#">Benito Juárez</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=BenitoJuarez">Asignar Calificaciones</a>
                    <a href="ver_alumnos.php?unidad=BenitoJuarez">Ver alumnos</a>

                </div>
            </div>
            <div class="dropdown">
                <a href="#">Huayacocotla</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=Huayacocotla">Asignar Calificaciones</a>
                    <a href="ver_alumnos.php?unidad=Huayacocotla">Ver alumnos</a>

                </div>
            </div>
            <div class="dropdown">
                <a href="#">Tlacolula</a>
                <div class="dropdown-content">
                    <a href="asignar_calificaciones.php?unidad=Tlacolula">Asignar Calificaciones</a>
                    <a href="ver_alumnos.php?unidad=Tlacolula">Ver alumnos</a>
                </div>
                
            </div>
        </div>
    </div>
</div>


<div class="main-content">
    <div class="container">
        <h2>Lista de Alumnos - <?php echo htmlspecialchars($unidad_academica); ?></h2>
        <table>
            <tr>
                <th>Número de Control</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Grupo</th>
                <th>Modalidad</th>
                <th>Módulo</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['numero_control']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['apellido_paterno']}</td>
                            <td>{$row['apellido_materno']}</td>
                            <td>{$row['carrera']}</td>
                            <td>{$row['semestre']}</td>
                            <td>{$row['grupo']}</td>
                            <td>{$row['modalidad']}</td>
                            <td>{$row['modulo']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay alumnos registrados en esta unidad académica.</td></tr>";
            }
            ?>
        </table>
        <a href="index.html" class="back-button">Regresar al Menú</a>
    </div>
</div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>