<?php
include '../conexion.php';
$numero_control = $_POST['numero_control'];


$sql = $conn->prepare("SELECT * FROM alumnos WHERE numero_control = ?");
$sql->bind_param("s", $numero_control);
$sql->execute();
$result = $sql->get_result();
$alumno = $result->fetch_assoc();

// Verificar si el alumno existe
if (!$alumno) {
    die("<p>No se encontró información para el número de control proporcionado.</p>");
}

$sql_cal = $conn->prepare("SELECT AVG(promedio) AS promedio_final FROM calificaciones WHERE numero_control = ?");
$sql_cal->bind_param("s", $numero_control);
$sql_cal->execute();
$result_cal = $sql_cal->get_result();
$calificacion = $result_cal->fetch_assoc();

// Verificar si hay calificación registrada
$promedio_final = $calificacion['promedio_final'] !== null ? number_format($calificacion['promedio_final'], 2) : 'No registrado';

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Constancia_Liberacion_$numero_control.doc");

echo "<html>
      <head>
      <meta charset='utf-8'>
      <title>Constancia de Liberación</title>
      </head>
      <body style='font-family: Arial, sans-serif; font-size: 12pt; line-height: 1;'>
      <p style='text-align: right; font-size: 10pt; font-weight: bold;'>INSTITUTO TECNOLÓGICO SUPERIOR DE CHICONTEPEC</p>
      <p style='text-align: right; font-size: 10pt; font-weight: bold;'>COORDINACIÓN DE LENGUAS EXTRANJERAS</p>
      <p style='text-align: right; font-size: 10pt; font-weight: bold;'>OFICIO N° ITSCHI /SA/CLE/038/2025</p>
      <p style='text-align: right; font-size: 10pt; font-weight: bold;'>Chicontepec, Ver.; a " . date("d") . " de " . strftime("%B") . " del " . date("Y") . "</p>
      <p style='text-align: right; font-size: 10pt; font-weight: bold;'>Asunto: Constancia</p>

      <p style='font-size: 12pt;'>A Quien Corresponda:</p>
      
      <p style='text-align: justify; font-size: 12pt;'>
      La que subscribe, hace constar que el estudiante <strong>" . $alumno['apellido_paterno'] . " " . $alumno['apellido_materno'] . " " . $alumno['nombre'] . "</strong>, con número de control <strong>" . $numero_control . "</strong>, de la carrera de <strong>" . $alumno['carrera'] . "</strong>, con clave del plan de estudios <strong>" . $alumno['clave_plan'] . "</strong>; cursó y aprobó los niveles del Programa de Inglés que oferta la Coordinación de Lenguas Extranjeras con número de registro TecNM-SEV-DECyaD-PCLE-04/19-ITSCHI-51, con una calificación de <strong>" . $promedio_final . "</strong>.
      </p>
      
      <p style='text-align: justify; font-size: 12pt;'>
      Por lo anterior, se considera que el estudiante queda exento del examen de Lengua Extranjera para efectos de Titulación en una Licenciatura en el Sistema Nacional de Educación Superior Tecnológica.
      </p>
      
      <p style='text-align: justify; font-size: 12pt;'>
      Se extiende la presente en la ciudad de Chicontepec, Ver., a los " . date("d") . " días del mes de " . strftime("%B") . " del " . date("Y") . ", para los fines legales que convengan al interesado.
      </p>
      
      <p style='text-align: center; font-size: 12pt;'><strong>A T E N T A M E N T E</strong></p>
      <p style='text-align: center; font-size: 12pt;'>“POR LA EXCELENCIA EDUCATIVA”</p>
      <p style='text-align: center; font-size: 12pt;'><strong>Lcda. Denysse Arely Avilés Torres</strong></p>
      <p style='text-align: center; font-size: 12pt;'>Coordinadora de Lenguas Extranjeras</p>
      </body>
      </html>";
?>
