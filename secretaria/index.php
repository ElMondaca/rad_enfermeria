<?php
require_once("bd/conexion.php");
require("template/header.php");
?>

<div class="col-lg-12">
    <legend>Registro de Supervisor</legend>
        <form method="post" id="form_registro">
        <div class="form-group">
            Rut del supervisor: <input type="text" class="form-control" name="rut" id="rut">
        </div>
        <div class="form-group">
            Nombre:  <input type="text" class="form-control" name="nalu" id="nalu">
        </div>
        <div class="form-group">
            Apellido paterno: <input type="text" class="form-control" name="app" id="app">
        </div>
        <div class="form-group">
            Apellido Materno:<input type="text" class="form-control" name="apm" id="apm">
        </div>
        <div class="form-group">
            Telefono del supervisor:<input type="text" class="form-control" name="tel" id="tel">
        </div>
        <div class="form-group">
            Mail del supervisor:<input type="text" class="form-control" name="mail" id="mail">
        </div>
        <br>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
        </form>
</div>
<br>
<legend>Supervisores registrados</legend>
<div class="col-lg-12" id="supervisores">
</div>

<script>
$(document).ready(function() {

    $( "#supervisores" ).load( "bd/supervisores.php", function() {});

    $("#enviar").click(function(){
        $.ajax({
        type: "POST",
        url: "bd/registro_supervisor.php",
        data: "rut=" + $("#rut").val() +
        '&nalu=' + $("#nalu").val() +
        '&app=' + $("#app").val() +
        '&apm=' + $("#apm").val() +
        '&tel=' + $("#tel").val() +
        '&mail=' + $("#mail").val(),
        success: function(data) {
            $( "#supervisores" ).load( "bd/supervisores.php", function() {});
            document.getElementById("form_registro").reset();
        },
        error: function(data){
            console.log(data);
        }
        });
    });
});
</script>
<script src="../js/bootstrap.js"></script>
</body>
</html>