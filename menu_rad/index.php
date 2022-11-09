<?php
require_once("bd/conexion.php");
require("template/header.php");
?>

<div class="col-lg-12">
<div class="col-lg-12">
<form class="form-horizontal">
    <fieldset>
        <legend>Seleccione semestre en Curso</legend>
        <div class="form-group">
        <div class="form-check">
            <select name="semestre" id="semestre">
                <option value="0">Listado Completo</option>
                <option value="1">Primer Semestre</option>
                <option value="2">Segundo Semestre</option>
            </select>
        <button type="button" class="btn btn-primary" id="filtrar">Buscar</button>
        </div>
    </fieldset>
    </form>
    <br>
</div>
<legend>Campos clínicos disponibles</legend>
<div class="col-lg-12" id="campos_clinicos">
</div>
</div>

</div>
</div>

<script>
$(document).ready(function() {

    $( "#campos_clinicos" ).load( "bd/cupos_disponibles.php", function() {});

    $("#filtrar").click(function(){
        $.ajax({
        type: "POST",
        url: "bd/filtrado.php",
        data: "busqueda=" + $("#semestre").val(),
        success: function(data) {
            $("#campos_clinicos").html(data);
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