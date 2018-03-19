<?php
include 'abrirConexion.php';

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
