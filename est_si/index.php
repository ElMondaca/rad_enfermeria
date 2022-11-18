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
        <select class="form-control" name="id_vac" id="id_vac">
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
        url: "ajax/registro_vacunas.php",
        data: "det_alumno=" + $("#det_alumno").val() +
        '&id_vac=' + $("#id_vac").val() +
        '&fecha_vac=' + $("#fecha_vac").val(),
        success: function(data) {
        if(data.success) {
            $( "#vacunados" ).load( "ajax/vacunados.php?id=<?php echo $r_alumno;?>", function() {});
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
    });});


});


</script>
</body>
</html>