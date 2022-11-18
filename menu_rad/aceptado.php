<?php
require_once("bd/conexion.php");
require("template/header.php");

$conexion = new conexion();
$conexion->conectar();

$id = $_GET["id"];
?>





<?php
require("template/footer.php");
?>