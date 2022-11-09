<?php
$semestre = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once("conexion.php");
$conexion = new conexion();
$conexion->conectar();

if($semestre != "0"){
$query_cupos = "SELECT PA.nombre_practica AS PRACTICA, CENTRO.nombre_institucion AS CENTRO, PC.cupo_campo AS CUPO, PC.det_semestre AS SEM, SE.nombre_semestre AS NSE 
                FROM practica AS PA, practica_has_centro as PC, institucion AS CENTRO, semestre AS SE 
                WHERE PA.id_practica = PC.det_practica AND CENTRO.id_institucion = PC.det_centro
                AND PC.det_semestre = SE.id_semestre
                AND PC.det_practica = $semestre ";

if($q = $conexion->mysqli->query($query_cupos)) {
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Lugar de práctica</th>
            <th>Práctica a Desarrollar</th>
            <th>Semestre que corresponde</th>
            <th>Cupos Disponibles</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="4" align="center">Detalle de actividades</td>
        </tr>
    </tfoot>
    <tbody>
<?php
while($datos=$q->fetch_object()):
?>
    <tr>
        <td><?=$datos->PRACTICA?></td>
        <td><?=$datos->CENTRO?></td>
        <td><?=$datos->NSE?></td>
        <td><?=$datos->CUPO?></td>
        <td> <a class="btn btn-primary" href="#" role="button">Inscritos</a> <a class="btn btn-info" href="#" role="button">Actualizar</a> </td>
    </tr>
<?php
    endwhile;
    } else {
        print_r(json_encode(array("error" => $conexion->mysqli->error)));
        exit();
    }
} else{
    $query_cupos = "SELECT PA.nombre_practica AS PRACTICA, CENTRO.nombre_institucion AS CENTRO, PC.cupo_campo AS CUPO, PC.det_semestre AS SEM, SE.nombre_semestre AS NSE 
                FROM practica AS PA, practica_has_centro as PC, institucion AS CENTRO, semestre AS SE 
                WHERE PA.id_practica = PC.det_practica AND CENTRO.id_institucion = PC.det_centro
                AND PC.det_semestre = SE.id_semestre ";

if($q = $conexion->mysqli->query($query_cupos)) {
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Lugar de práctica</th>
            <th>Práctica a Desarrollar</th>
            <th>Semestre que corresponde</th>
            <th>Cupos Disponibles</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="4" align="center">Detalle de actividades</td>
        </tr>
    </tfoot>
    <tbody>
<?php
while($datos=$q->fetch_object()):
?>
    <tr>
        <td><?=$datos->PRACTICA?></td>
        <td><?=$datos->CENTRO?></td>
        <td><?=$datos->NSE?></td>
        <td><?=$datos->CUPO?></td>
        <td> <a class="btn btn-primary" href="#" role="button">Inscritos</a> <a class="btn btn-info" href="#" role="button">Actualizar</a> </td>
    </tr>
<?php
endwhile;
} else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
}
}
?>
    </tbody>
</table>