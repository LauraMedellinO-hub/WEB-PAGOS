<?php
include '../conexion.php';

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$unidad_academica = isset($_GET['unidad_academica']) ? trim($_GET['unidad_academica']) : '';
$carrera = isset($_GET['carrera']) ? trim($_GET['carrera']) : '';
$modulo = isset($_GET['modulo']) ? intval($_GET['modulo']) : 0;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Calificaciones</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        
        th {
            background-color: #007bff;
            color: white;
        }

        .aprobado { color: green; font-weight: bold; }
        .reprobado { color: red; font-weight: bold; }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form select, .search-form button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
        }

        .search-form button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }
        .sidebar a:hover {
            background-color: #0056b3;
        }

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

        .dropdown-content a {
            padding: 10px;
            display: block;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .dropdown-content a:hover {
            background-color: #0056b3;
        }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
        }

        .search-form button {
            padding: 8px 15px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #0056b3;
        } .sidebar {
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

<div class="main-content">
    <div class="container">
        <h1>Ver Calificaciones</h1>

        <div class="search-form">
            <form method="GET" action="ver_calificaciones.php">
                <label for="unidad_academica">Selecciona la Unidad Académica:</label>
                <select name="unidad_academica" id="unidad_academica" onchange="actualizarCarreras()">
                    <option value="">Selecciona una unidad</option>
                    <option value="Chicontepec">Chicontepec</option>
                    <option value="BenitoJuarez">Benito Juárez</option>
                    <option value="Huayacocotla">Huayacocotla</option>
                    <option value="Tlacolula">Tlacolula</option>
                </select>

                <br><br>

                <label for="carrera">Selecciona la Carrera:</label>
                <select name="carrera" id="carrera" disabled onchange="actualizarModulos()">
                    <option value="">Selecciona una carrera</option>
                </select>

                <br><br>

                <label for="modulo">Selecciona el Módulo:</label>
                <select name="modulo" id="modulo" disabled>
                    <option value="">Selecciona un módulo</option>
                </select>

                <br><br>
                <button type="submit">Buscar Calificaciones</button>
            </form>
        </div>

        <div id="resultado">
            <?php
            if (!empty($unidad_academica) && !empty($carrera) && !empty($modulo)) {
                $stmt = $conn->prepare("SELECT c.*, a.unidad_academica, a.carrera 
                                        FROM calificaciones c
                                        JOIN alumnos a ON c.numero_control = a.numero_control
                                        WHERE a.unidad_academica = ? 
                                        AND a.carrera = ? 
                                        AND c.modulo = ?");
                $stmt->bind_param("ssi", $unidad_academica, $carrera, $modulo);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>Número de Control</th>
                                <th>Unidad Académica</th>
                                <th>Carrera</th>
                                <th>Módulo</th>
                                <th>Unidad 1</th>
                                <th>Unidad 2</th>
                                <th>Unidad 3</th>
                                <th>Unidad 4</th>
                                <th>Promedio</th>
                                <th>Pago</th>

                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        $clase = ($row['promedio'] >= 70) ? "aprobado" : "reprobado";
                        $estado_pago = ($row['pago'] == 'Pagado') ? "checked" : "";
                        echo "<tr>
                                <td>{$row['numero_control']}</td>
                                <td>{$row['unidad_academica']}</td>
                                <td>{$row['carrera']}</td>
                                <td>{$row['modulo']}</td>
                                <td>{$row['unidad1']}</td>
                                <td>{$row['unidad2']}</td>
                                <td>{$row['unidad3']}</td>
                                <td>{$row['unidad4']}</td>
                                <td class='$clase'>{$row['promedio']}</td>
                                <td>
                                <input type='checkbox' class='pago-checkbox' data-id='{$row['numero_control']}' $estado_pago>
                                </td>
                              </tr>";
                    }


                    echo "</table>";
                } else {
                    echo "<p>No se encontraron calificaciones.</p>";
                }
                
            }
            $conn->close();
            ?>
        </div>
    </div>
</div>

<script>
    const carreras = {
        Chicontepec: ["ISC", "IDC", "IGE"],
        BenitoJuarez: ["ISC", "IDC", "IGE"],
        Huayacocotla: ["ISC", "IDC", "IGE"],
        Tlacolula: ["ISC", "IDC", "IGE"]
    };

    function actualizarCarreras() {
        let unidad_academica = document.getElementById("unidad_academica").value;
        let carreraSelect = document.getElementById("carrera");
        let moduloSelect = document.getElementById("modulo");

        carreraSelect.innerHTML = '<option value="">Selecciona una carrera</option>';
        moduloSelect.innerHTML = '<option value="">Selecciona un módulo</option>';
        moduloSelect.disabled = true;

        if (unidad_academica && carreras[unidad_academica]) {
            carreraSelect.disabled = false;
            carreras[unidad_academica].forEach(carrera => {
                let option = new Option(carrera, carrera);
                carreraSelect.add(option);
            });
        } else {
            carreraSelect.disabled = true;
        }
    }

    function actualizarModulos() {
        let moduloSelect = document.getElementById("modulo");
        moduloSelect.innerHTML = `
            <option value="">Selecciona un módulo</option>
            <option value="1">Módulo 1</option>
            <option value="2">Módulo 2</option>
            <option value="3">Módulo 3</option>
            <option value="4">Módulo 4</option>
            <option value="5">Módulo 5</option>
        `;
        moduloSelect.disabled = false;
    }


    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".pago-checkbox").forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            let numero_control = this.getAttribute("data-id");
            let modulo = this.getAttribute("data-modulo"); // Obtener el módulo desde el atributo data
            let pago = this.checked ? "Pagado" : "Pendiente";

            fetch("actualizar_pago.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "numero_control=" + numero_control + "&modulo=" + modulo + "&pago=" + pago
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
            })
            .catch(error => console.error("Error:", error));
        });
    });
});



</script>

</body>
</html>