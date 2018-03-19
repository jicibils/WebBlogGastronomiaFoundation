<?php
include 'abrirConexion.php';

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
}

mysqli_close($connect_db);

?>
