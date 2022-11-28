<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST, 'nalu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$app = filter_input(INPUT_POST, 'app', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apm = filter_input(INPUT_POST, 'apm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$rs_registrosupervisor = "INSERT INTO supervisor (rut_supervisor, n_supervisor, app_supervisor, apm_supervisor, email_supervisor, fono_supervisor)
            VALUES ('$rut', '$nombre', '$app', '$apm', '$mail', '$tel')";

if($conexion->mysqli->query($rs_registrosupervisor)) {
    print_r(json_encode(array("success" => 1)));
}
else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
exit();
}
$conexion->desconectar();
?>