<?php
require("template/header.php");
require_once("bd/conexion.php");

$id = $_GET['id'];
?>

<div class="col-lg-12">
    <form class="form-horizontal">
    <table class="table table-bordered">
        <thead>
            <h4>Tus prácticas inscritas</h4>
        </thead>
        <tbody>
            <tr>
                <td>Asignatura</td>
                <td>Lugar de práctica</td>
                <td>Fecha de inicio</td>
                <td>Fecha de termino</td>
                <td>Documentos de práctica</td>
            </tr>
            <tr>
                <td>Practica 1</td>
                <td>Practica 1</td>
                <td>Practica 1</td>
                <td>Practica 1</td>
                <td>
                    <input type="radio" name="documento" value="Documento 1">
                </td>
            </tr>
            <tr>
                <td>Practica 2</td>
                <td>Practica 2</td>
                <td>Practica 2</td>
                <td>Practica 2</td>
                <td>
                    <input type="radio" name="documento" value="Documento 2">
                </td>
            </tr>
            <tr>
                <td>Practica 3</td>
                <td>Practica 3</td>
                <td>Practica 3</td>
                <td>Practica 3</td>
                <td>
                    <input type="radio" name="documento" value="Documento 3">
                </td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-info" id="enviar">Ver documentos</button>
    </form>
    <br>
</div>

<hr>
<div class="documentos_practica" name="documentos_practica" id="documentos_practica">

</div>


</div>
</div>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){

    $("#enviar").click(function(){
        valorActivo = document.querySelector('input[name="documento"]:checked').value;
        $.ajax({
            type: "POST",
            url: "bd/documentos_practica.php",
            data: "enviar=" + valorActivo,
            success: function(data) {
                $("#documentos_practica").html(data);
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