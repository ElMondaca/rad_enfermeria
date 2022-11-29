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

echo "<legend>Detalle de vacunas</legend>";
echo "<div class='bs-component'>";
echo "<div class='panel-body'>";
if($q = $conexion->mysqli->query($query)) {
?>

<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Vacuna</th>
                <th>Fecha de vacunacion</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
<?php
while($datos=$q->fetch_object()):
?>
    <tr>
        <td><?=$datos->VACCU?></td>
        <td><?=$datos->FECHAVACCU?></td>
        <?php
        if($datos->CARNET == 0){
        ?>
        <td><a class="btn btn-info" href="registrar_carnet.php?id=<?=$datos->IDVAC?>" role="button">Agregar documento</a> </td>
        <?php
        }else{
        ?>
        <td><a class="btn btn-info" href="mostrar_carnet.php?id=<?=$datos->CARNET?>" role="button">Ver documento</a> </td>
        <?php
        }
        endwhile;
        }else {
            print_r(json_encode(array("error" => $conexion->mysqli->error)));
            exit();
        }
        ?>
    </tr>
</tbody>
</table>
</div>