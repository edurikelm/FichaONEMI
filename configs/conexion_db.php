<?php
$usuario = 'root';
$password = '';
$nombre_bd = 'fichaonemi';

$enlace = mysqli_connect("localhost",$usuario,$password,$nombre_bd);

/* verificar la conexión */
if (mysqli_connect_errno()) {
    // printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
// echo 'se conecto la wea';

// printf("Conjunto de caracteres inicial: %s\n", mysqli_character_set_name($enlace));

/* cambiar el conjunto de caracteres a utf8 */
if (!mysqli_set_charset($enlace, "utf8")) {
    // printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($enlace));
    exit();
} else {
    // printf("Conjunto de caracteres actual: %s\n", mysqli_character_set_name($enlace));
}


?>