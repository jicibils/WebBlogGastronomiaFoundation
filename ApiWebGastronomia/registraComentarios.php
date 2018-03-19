<?php
// Parametros a configurar para la conexion de la base de datos

define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "gastronomiaWeb");

// Fin de los parametros a configurar para la conexion de la base de datos

$connect_db = mysqli_connect(DB_HOST , DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$connect_db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Recibimos por POST los datos procedentes del formulario

$comentario = $_POST["comentario"];
$tituloPubli = $_POST["tituloPubli"];


//insertamos objeto del formulario
$sql = "INSERT INTO comentarios (id,comentario,tituloPubli) VALUES ('','$comentario','$tituloPubli')";
if (!$resultado = $connect_db->query($sql)) {
    // ¡Oh, no! La consulta falló.
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $connect_db->errno . "\n";
    echo "Error: " . $connect_db->error . "\n";
    exit;
}

mysqli_close($connect_db);


?>
