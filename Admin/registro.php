<!DOCTYPE html>
<html>
<head>
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

h1 {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
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

        .dropdown-content a:hover {
            background-color: #0056b3;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
            background-color: #007bff;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }


        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
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

 <!-- contenido principal -->

    <div class="container">
        <form action="guardar_alumno.php" method="POST">
            <div class="form-title">Registro de Alumnos</div>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" required>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" name="apellido_materno" placeholder="Apellido Materno" required>

            <label for="numero_control">Número de Control:</label>
            <input type="text" name="numero_control" placeholder="Número de Control" required>

            <label for="unidad_academica">Unidad Académica:</label>
            <select name="unidad_academica" id="unidad_academica" required>
                <option value="">Seleccione una opción</option>
                <option value="Chicontepec">Chicontepec</option>
                <option value="Huayacocotla">Huayacocotla</option>
                <option value="Tlacolula">Tlacolula</option>
                <option value="Benito Juárez">Benito Juárez</option>
            </select>

            <label for="carrera">Carrera:</label>
            <select name="carrera" id="carrera" required>
                <option value="">Seleccione una opción</option>
                <option value="ISC">Ingeniería en Sistemas Computacionales (ISC)</option>
                <option value="IDC">Ingeniería en Desarrollo Comunitario (IDC)</option>
                <option value="IGE">Ingeniería en Gestión Empresarial (IGE)</option>
            </select>

            <label for="semestre">Semestre:</label>
            <select name="semestre" id="semestre" required>
                <option value="">Seleccione una opción</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>

            <label for="grupo">Grupo:</label>
            <select name="grupo" id="grupo" required>
                <option value="">Seleccione una opción</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>

            <label for="modalidad">Modalidad:</label>
            <select name="modalidad" id="modalidad" required>
                <option value="">Seleccione una opción</option>
                <option value="Escolarizado">Escolarizado</option>
                <option value="Semiescolarizado">Semiescolarizado</option>
            </select>

            <label for="modulo">Módulo:</label>
            <select name="modulo" id="modulo" required>
                <option value="">Seleccione una opción</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
    </div>

</body>
</html>
