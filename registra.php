<?php
// Parametros a configurar para la conexion de la base de datos

// $hotsdb = "localhost";    // valor de nuestra BD
// $basededatos = "gastronomiaWeb";    // valor de nuestra BD
//
// $usuariodb = "root";    // valor de nuestra BD
// $clavedb = "root";    // valor de nuestra BD
//
// $tabla_db1 = "publicacion";    // valor de una tabla
// $tabla_db2 = "comentarios";    // valor de otra tabla
//
// Fin de los parametros a configurar para la conexion de la base de datos

$conexion_db = mysql_connect("localhost","root","root")
    or die ("Conexión denegada, el Servidor de Base de datos que solicitas NO EXISTE");
    $db = mysql_select_db("gastronomiaWeb", $conexion_db)
    or die ("La Base de Datos <b>$basededatos</b> NO EXISTE");

// Recibimos por POST los datos procedentes del formulario

$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];

// Abrimos la conexion a la base de datos
// include("abre_conexion.php");

mysql_query("INSERT INTO publicacion VALUES ('','$titulo','$descripcion','$fecha')",$conexion_db);

// Cerramos la conexion a la base de datos
include("cierra_conexion.php");

// Confirmamos que el registro ha sido insertado con exito

echo "
<p>Los datos han sido guardados con exito.</p>

<p><a href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p>
";
?>
