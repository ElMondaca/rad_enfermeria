<?php
require_once("conexion.php");


$conexion = new conexion();
$conexion->conectar();

$dato  = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $dato;

?>

<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rut del estudiante</th>
                <th>Rut del estudiante</th>
                <th>Rut del estudiante</th>
                <th>Rut del estudiante</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $id?></td>
            <td>hola mundo 1</td>
            <td>hola mundo 1</td>
            <td>hola mundo 1</td>
        </tr>
    </tbody>
    </table>
</div>