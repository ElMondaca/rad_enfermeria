<?php
require_once("conexion.php");


$conexion = new conexion();
$conexion->conectar();

$dato  = filter_input(INPUT_POST, 'id_est', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $dato;

?>

<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rut del estudiante</th>
                <th>Documento 1</th>
                <th>Documento 2</th>
                <th>Documento 3</th>
                <th>Ver prácticas inscritas</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $id?></td>
            <td>Ver vacuna 1</td>
            <td>Ver vacuna 2</td>
            <td>Ver vacuna 3</td>
            <td><a class="btn btn-info" href="inscritos.php?id=<?=$datos->ICAM?>" role="button">Prácticas inscritas</a></td>
        </tr>
    </tbody>
    </table>
</div>