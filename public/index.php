<?php
// Cargo el archivo con las funciones del estudiante, una sola vez
require_once __DIR__ . '/../lib/estudiante.php';

# Dejo fijada la zona horaria de Panamá para que la hora sea la correcta
date_default_timezone_set('America/Panama');

/* Aqui leo mis datos desde estudiante.json
   usando la función que viene en la librería */
$estudiante = cargar_estudiante();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?php // El título lleva "Lab 8 - " y mi apellido sacado del JSON ?>
    <title>Lab 8 - <?= $estudiante['apellido'] ?></title>
</head>
<body>
    <?php # Muestro mi nombre y apellido como encabezado principal ?>
    <h1><?= $estudiante['nombre'] . ' ' . $estudiante['apellido'] ?></h1>
    <?php
    /* Con echo imprimo la versión de PHP
       que esta ejecutando este script */
    echo '<p>Versión de PHP: ' . PHP_VERSION . '</p>';

    // Con print imprimo la fecha y hora actual en formato dd/mm/aaaa HH:mm
    print '<p>Fecha y hora actual: ' . date('d/m/Y H:i') . '</p>';

    # Fin del bloque PHP, lo que sigue es solo HTML para cerrar la página
    ?>
</body>
</html>
