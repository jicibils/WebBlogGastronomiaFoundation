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


$sql = "SELECT titulo,descripcion,fecha,foto FROM publicaciones";
if (!$resultado = $connect_db->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

$listaPublicaciones =  array();
while ($publicacion = $resultado->fetch_assoc()) {
  $listaPublicaciones[] = json_encode($publicacion);
}
echo json_encode($listaPublicaciones);

$resultado->free();
mysqli_close($connect_db);

?>
