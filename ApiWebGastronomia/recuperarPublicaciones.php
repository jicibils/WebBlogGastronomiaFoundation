<?php
include 'abrirConexion.php';

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
