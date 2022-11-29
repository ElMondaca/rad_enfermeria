<?php

require_once("bd/conexion.php");
require("template/header.php");

$conexion = new conexion();
$conexion->conectar();
$rut_supervisor = $_GET["id"];
$query = "SELECT * FROM supervisor WHERE rut_supervisor = '$rut_supervisor'";
if($q = $conexion->mysqli->query($query)) {
    $datos=$q->fetch_object();
}else{
print_r(json_encode(array("error" => $conexion->mysqli->error)));
exit();
}
?>

<div class="col-lg-4">
    <legend>Detalle del supervisor</legend>
    <div class="panel-body">
        <p>Rut del Supervisor: <?=$datos->rut_supervisor?></p>
        <p>Nombre: <?=$datos->n_supervisor." ".$datos->app_supervisor." ".$datos->apm_supervisor?></p>
        <p>Correo electrónico: <?=$datos->email_supervisor?></p>
        <p>Telefono: <?=$datos->fono_supervisor?></p>
    </div>
</div>
<div class="col-lg-8" id="vacunados">
    <legend>Detalle de inmunizaciones</legend>
</div>
<div class="col-lg-12">
    <legend>Registro de vacunas</legend>
    <form method="post" id="vacunas">
        <select class="form-control" name="id_vac" id="id_vac">
        <option value="0">Vacunas administradas</option>
        <?php
        $qequipo = "SELECT * FROM vacuna";
        if($equ = $conexion->mysqli->query($qequipo)){
            while($equipo = $equ->fetch_object()):
        ?>
            <option value="<?=$equipo->id_vacuna?>"><?=$equipo->n_vacuna?> </option>
            <?php
        endwhile;
        }
        else{
            print_r(json_encode(array("error" => $conexion->mysqli->error)));
            exit();
        }
        ?>
        </select>
        <br>
        <div class="form-group">
            Indique fecha de vacunación: <input type="date" class="form-control" name="fecha_vac" id="fecha_vac">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="det_supervisor" id="det_supervisor" value="<?=$rut_supervisor;?>">
        </div>
        <br>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="enviar">Registrar</button>
        </div>
    </form>
    </div>
    

</div>
</div>
<script src="../js/bootstrap.js"></script>
<script>
    $(document).ready(function() {

        $( "#supervisores" ).load( "bd/supervisores.php", function() {});
        $( "#vacunados" ).load( "bd/vacunas.php?id=<?php echo $rut_supervisor;?>", function() {});

        $("#enviar").click(function(){
        $.ajax({
        type: "POST",
        url: "bd/registro_vacunas.php",
        data: "det_supervisor=" + $("#det_supervisor").val() +
        '&id_vac=' + $("#id_vac").val() +
        '&fecha_vac=' + $("#fecha_vac").val(),
        success: function(data) {
        if(data.success) {
            $( "#vacunados" ).load( "bd/vacunas.php?id=<?php echo $rut_supervisor;?>", function() {});
            document.getElementById("vacunas").reset();
        }
        else {
            console.log("error");
            console.log(data);
        }
        }, error: function(data){
            console.log("error");
            console.log(data);
        }
        });
    });
});
</script>
</body>
</html>