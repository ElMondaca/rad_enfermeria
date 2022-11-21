<?php
require_once("bd/conexion.php");
require("template/header.php");

$conexion = new conexion();
$conexion->conectar();

$id = $_GET["id"];



echo "<h1> El id del estudiante seleccionado es ".$id."</h1>";
?>





<?php
require("template/footer.php");
?>