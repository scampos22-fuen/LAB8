<?php
declare(strict_types=1);
 
define('SEMILLA_LAB8', 'WEB2026-L8');
const LAB_NUMERO = 8;
 
require_once __DIR__ . '/../lib/estudiante.php';
$est = cargar_estudiante();
 
$huella = hash('sha256', $est['cedula'] . '|' . SEMILLA_LAB8);
$codigo = substr($huella, 0, 8);
$n1     = hexdec(substr($huella, 8, 2)) % 90 + 10;
$n2     = hexdec(substr($huella, 10, 2)) % 90 + 10;
$precio = round(hexdec(substr($huella, 12, 4)) / 100, 2);
$activo = ($n1 % 2 === 0);
 
$suma     = $n1 + $n2;
$division = round($n1 / $n2, 2);
$resto    = $n1 % $n2;
$cociente = intdiv($n1, $n2);
 
$nulo  = null;
$lista = [1, 2, 3];
 
var_dump($codigo);
var_dump($n1);
var_dump($precio);
var_dump($activo);
var_dump($nulo);
var_dump($lista);
 
// PHP convierte los strings "5" y "10" a números porque el + es una operación aritmética: da 15 (int)
$suma_str = "5" + "10";
 
// El punto es concatenación, así que no suma: junta los textos y da "510" (string)
$concat = "5" . "10";
 
// El cast a int lee los dígitos del inicio y se detiene en la primera letra: da 12
$cast_int = (int) "12abc";
 
// Los decimales se guardan en binario con un pequeño error, 0.1 + 0.2 da 0.30000000000000004, por eso da false
$float_eq = (0.1 + 0.2 == 0.3);
 
// Con == ambos strings son numéricos y se comparan como números: "1e1" es 1x10^1 = 10, así que da true
$loose = ("10" == "1e1");
 
// Con === se compara también el tipo y el contenido exacto: los textos son distintos, así que da false
$strict = ("10" === "1e1");
 
$resultado = [
    'codigo'    => $codigo,
    'n1'        => $n1,
    'n2'        => $n2,
    'suma'      => $suma,
    'division'  => $division,
    'resto'     => $resto,
    'cociente'  => $cociente,
    'precio'    => $precio,
    'activo'    => $activo,
    'tipos'     => [
        'codigo' => gettype($codigo),
        'n1'     => gettype($n1),
        'precio' => gettype($precio),
        'activo' => gettype($activo),
        'nulo'   => gettype($nulo),
        'lista'  => gettype($lista),
    ],
    'juggling'  => [
        'suma_str' => $suma_str,
        'concat'   => $concat,
        'cast_int' => $cast_int,
        'float_eq' => $float_eq,
        'loose'    => $loose,
        'strict'   => $strict,
    ],
    'constantes' => [
        'SEMILLA_LAB8' => constant('SEMILLA_LAB8'),
        'LAB_NUMERO'   => LAB_NUMERO,
        // Una constante ya definida no se puede cambiar: define() devuelve false (el @ oculta el aviso)
        'redefinir'    => @define('SEMILLA_LAB8', 'otra'),
    ],
];
 
echo "\n##JSON## " . json_encode($resultado) . "\n";
