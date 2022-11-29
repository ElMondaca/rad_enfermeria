<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$r_supervisor = $_GET['id'];


$query = "SELECT supervisor.rut_supervisor AS RUT, vacuna.n_vacuna AS VACCU, sup_has_vacuna.fecha_dosis AS FECHAVACCU,
sup_has_vacuna.id_vacunacion AS IDVAC, sup_has_vacuna.det_documento AS CARNET
FROM vacuna, sup_has_vacuna, supervisor
WHERE sup_has_vacuna.det_vacuna = vacuna.id_vacuna AND sup_has_vacuna.det_supervisor = supervisor.rut_supervisor
AND sup_has_vacuna.det_supervisor = '$r_supervisor'
ORDER BY sup_has_vacuna.fecha_dosis";

echo "<legend>VACUNACIONES DE ESTUDIANTE</legend>";
echo "<div class='bs-component'>";
echo "<div class='panel-body'>";
if($q = $conexion->mysqli->query($query)) {
while($datos=$q->fetch_object()):
?>
    <p>Datos de vacuna: <?=$datos->VACCU." - Fecha vacunación: ".$datos->FECHAVACCU?><br>
    <?php
    if($datos->CARNET == 0){
    ?>
<a href='carnet_vacuna.php?id=<?php echo $datos->IDVAC;?>'>Cargar comprobante de vacuna</a></p>
<br>
<?php
}else{
?>
<a href='ver_carnet.php?id=<?php echo $datos->CARNET;?>' target="_blank">Ver comprobante de vacuna</a></p>
<br>
<?php
}
endwhile;
    echo "</div>";
    echo "</div>";
}
else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
}
?>