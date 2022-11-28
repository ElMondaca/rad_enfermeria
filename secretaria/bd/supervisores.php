<?php
require_once("conexion.php");


$conexion = new conexion();
$conexion->conectar();

$q_supervisor = "SELECT * FROM supervisor";
if($q = $conexion->mysqli->query($q_supervisor)) {
?>

<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rut del Supervisor</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Télefono de contacto</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($datos=$q->fetch_object()):
            ?>
                <tr>
                    <td><?=$datos->rut_supervisor?></td>
                    <td><?=$datos->n_supervisor." ".$datos->app_supervisor." ".$datos->apm_supervisor?></td>
                    <td><?=$datos->email_supervisor?></td>
                    <td><?=$datos->fono_supervisor?></td>
                    <td><a class="btn btn-info" href="registrar_vacuna.php?id=<?=$datos->rut_supervisor?>" role="button">Registrar Vacunas</a> </td>
                </tr>
            <?php
            endwhile;
            } else {
                print_r(json_encode(array("error" => $conexion->mysqli->error)));
                exit();
            }
            ?>
    </tbody>
    </table>
</div>