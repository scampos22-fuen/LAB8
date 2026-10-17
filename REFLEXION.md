# Reflexión (Etapa 4)

Responde con tus palabras (mínimo 40 palabras por respuesta). Ver README, Etapa 4.

## Pregunta 1
Mi $codigo personal es [8bf4a96a]. Al usar gettype($codigo) obtuve string. Esto pasa porque substr siempre trabaja con texto: toma un pedazo del hash, que es una cadena de caracteres hexadecimales, y devuelve otra cadena, aunque ese pedazo se vea como un número. Si lo usara en una suma, PHP intentaria convertirlo a numero: si empieza con digitos tomaria esos y lo demas lo ignoraria con un aviso, y si empieza con una letra daria error con strict_types o lo trataria como 0.


## Pregunta 2
gettype($precio) muestra double y no float por una razon historica: en PHP ambos nombres son el mismo tipo, pero gettype() mantuvo el nombre antiguo double para no romper programas viejos. La expresión 0.1 + 0.2 == 0.3 es false porque los decimales se guardan en binario y 0.1 y 0.2 no se pueden representar exactos, así que la suma da 0.30000000000000004. $n1 es de tipo integer, porque sale de hexdec(...) % 90 + 10. La diferencia es que / devuelve un float con decimales, mientras que intdiv devuelve solo la parte entera del cociente, descartando el resto.

## Pregunta 3
Con define() la constante se crea mientras el programa corre, así que puedo usarla dentro de if o funciones y darle un nombre calculado. En cambio const se resuelve al compilar el archivo, debe ir en el nivel principal y su nombre tiene que ser fijo. En mi instalación, con PHP [8.2.12] y el servidor [127.0.0.1], redefinir me dio false. Es logico: SEMILLA_LAB8 ya estaba definida y una constante no se puede cambiar. PHP lanza un aviso, pero el @ lo oculta y solo queda el false.
