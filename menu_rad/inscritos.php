<?php
require_once("bd/conexion.php");
require("template/header.php");

$dato = $_GET["id"];

$conexion = new conexion();
$conexion->conectar();


$query_centro = "SELECT PRA.nombre_practica AS NPRA, SEM.nombre_semestre AS NSEM, INST.nombre_institucion AS NINST 
                FROM practica AS PRA, semestre AS SEM, institucion AS INST, practica_has_centro AS PRAC
                WHERE PRA.id_practica = PRAC.det_practica AND SEM.id_semestre = PRAC.det_semestre AND INST.id_institucion = PRAC.det_centro
                AND PRAC.id_campo = $dato";

$q2 = $conexion->mysqli->query($query_centro);

$query_cupos = "SELECT EST.rut_estudiante AS RUT, EST.nombre_estudiante AS NOMBRE, EST.app_estudiante AS APP, EST.apm_estudiante AS APM,
                EHP.fecha_inicio AS INICIO, EHP.fecha_termino AS TERMINO, EHP.estado_reserva AS ESTADO
                FROM estudiante AS EST, est_has_practica AS EHP
                WHERE EST.rut_estudiante = EHP.det_estudiante
                AND EHP.det_practica = $dato";

if($q = $conexion->mysqli->query($query_cupos)) {
?>
<h4>Detalle de práctica</h4>
<table>
    <tbody>
    <?php
        while($datos2=$q2->fetch_object()):
    ?>
            <tr>
                <td>
                    Centro de práctica: <?=$datos2->NINST?>
                </td>
                <td>
                    Nombre de la práctica: <?=$datos2->NPRA?>
                </td>
                <td>
                    Semestre que corresponde: <?=$datos2->NSEM?>
                </td>
            </tr>
    <?php
        endwhile;
    ?>
    </tbody>
</table>

<hr>
<h4>Detalle de estudiantes inscritos</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Rut Estudiante</th>
            <th>Nombre Estudiante</th>
            <th>Fecha de inicio de práctica</th>
            <th>Fecha de termino de práctica</th>
            <th>Estado de inscripción</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="6" align="center">Detalle de estudiantes inscritos</td>
        </tr>
    </tfoot>
    <tbody>
<?php
while($datos=$q->fetch_object()):
    ?>
        <tr>
            <td><?=$datos->RUT?></td>
            <td><?=$datos->NOMBRE." ".$datos->APP." ".$datos->APM?></td>
            <td><?=utf8_decode($datos->INICIO)?></td>
            <td><?=utf8_decode($datos->TERMINO)?></td>
            <td><?=utf8_decode($datos->ESTADO)?></td>

    <?php if($datos->ESTADO == "Aceptado"){ ?>
                <td> <a class="btn btn-primary" href="aceptado.php?id=<?=$datos->ICAM?>" role="button">Detalles de inscripción</a></td>
    <?php 
        }else{
    ?>
            <td> <a class="btn btn-primary" href="en_espera.php?id=<?=$datos->ICAM?>" role="button">Revisar inscripción</a></td>
    <?php } ?>
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
<?php
require("template/footer.php");
?>