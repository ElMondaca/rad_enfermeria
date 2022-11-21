<?php
require("template/header.php");
require_once("bd/conexion.php");

    $conexion = new conexion();
    $conexion->conectar();

    $q_listadoEstudiantes = "SELECT * 
    FROM estudiante
    WHERE estudiante.habilitado = 'si'";
    ?>
    <div class="col-lg-12">
        <legend>Seleccionar Estudiante para simular situación</legend>
        <form method="post" id="vacunas">
        <select class="form-control" name="id_est" id="id_est">
            <option value="0">Estudiantes Habilitados</option>
            <?php
            if($q = $conexion->mysqli->query($q_listadoEstudiantes)) {
            while($estudiante = $q->fetch_object()):
            ?>
            <option value="<?=$estudiante->rut_estudiante?>"><?=$estudiante->nombre_estudiante." ".$estudiante->app_estudiante." ".$estudiante->apm_estudiante?> </option>
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
        <div class="col-lg-10 col-lg-offset-2">
            <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
        </form>
        <br>
    </div>
    <div class="col-lg-12" id="vacunados">
        <legend>DETALLE PRÁCTICA ESTUDIANTE</legend>
    </div>

</div>
</div>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){

    $("#enviar").click(function(){
        $.ajax({
            type: "POST",
            url: "bd/estudiante_filtrado.php",
            data: "id_est=" + $("#id_est").val(),
            success: function(data) {
                $("#vacunados").html(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    }); 
});


</script>
</body>
</html>