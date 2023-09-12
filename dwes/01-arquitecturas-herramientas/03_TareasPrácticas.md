# Generación dinámica de contenido
Realiza prácticas sencillas introduciendo código php, HTML y CSS
Realiza una página que:
1. Escriba "Hola mundo!" de forma dinámica con la instrucción echo
2. Escriba "Hola mundo!" usando una variable para almacenar la cadena
3. Escriba después de "Hola mundo!" "Esta página ha sido programada por <tu nombre>"
4. Modifica la página para que escriba la parte "Esta página..." en cursiva y
    "<tu nombre>" en cursiva y negrita.
    NOTA: Puedes utilizar el operador "." para concatenar la salida
5. Utilice 3 variables: $nombre, $r, $pi. Al visitar
    la página establecerá el valor de las variables, escribirá un mensaje de
    bienvenida y escribirá el área y el perímetro de la circunferencia.
    NOTA: Utiliza un fichero css para dar estilo a cada parte.
6. Declare 2 variables, después produzca la suma, resta, multiplicación,
    división, resto y muestre la salida de aplicar el operador ++ y --
    NOTA: ¿Qué variables hemos definido? print_r(get_defined_vars());
    http://php.net/manual/es/function.get-defined-vars.php
    http://php.net/manual/es/function.print-r.php
11. Imprima una pirámide de asteriscos, tamaño definido por una variable $n
12. Imprima una pirámide de colores
    NOTA: Utiliza css para definir elementos que tengan ancho fijo
          y un asterisco en el centro.
    NOTA2: Utiliza la siguiente función php para pintar colores aleatorios,
    debes sobrescribir la propiedad background-color del elemento html a través
    de la etiqueta style.
<?php
function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
?>
