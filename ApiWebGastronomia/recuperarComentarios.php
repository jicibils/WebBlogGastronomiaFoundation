<?php
include 'abrirConexion.php';

$sql = "SELECT comentario,tituloPubli FROM comentarios";
if (!$resultado = $connect_db->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}
$listaComentarios =  array();
while ($comentario = $resultado->fetch_assoc()) {
  $listaComentarios[] = json_encode($comentario);
}
echo json_encode($listaComentarios);

$resultado->free();
mysqli_close($connect_db);

?>
