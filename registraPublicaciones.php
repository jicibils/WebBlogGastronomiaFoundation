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

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($connect_db) . PHP_EOL;

// Recibimos por POST los datos procedentes del formulario

$titulo = $_POST["titulo"];
$fecha = getdate();
$dia = $fecha['mday'];
$mes = $fecha['mon'];
$anio = $fecha['year'];
$fechaHoy = $anio . "/" . $mes . "/" . $dia;
$descripcion = $_POST["descripcion"];
$foto = $_POST["foto"];


//insertamos objeto del formulario
$sql = "INSERT INTO publicaciones (id,titulo,descripcion,fecha,foto) VALUES ('','$titulo','$descripcion','$fechaHoy','$foto')";
if (!$resultado = $connect_db->query($sql)) {
    // ¡Oh, no! La consulta falló.
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $connect_db->errno . "\n";
    echo "Error: " . $connect_db->error . "\n";
    exit;
}else {
  // Confirmamos que el registro ha sido insertado con exito
  // echo "INSERTADO CON EXITO";
}

mysqli_close($connect_db);


//en vez que vuelva atras que publique y luego vuelva a la pagina principal
// echo "
//
// <p><a href='javascript:agregarPublicacion'>VOLVER ATRÁS</a></p>
// ";
?>
