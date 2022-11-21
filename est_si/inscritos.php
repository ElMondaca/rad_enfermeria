<?php
require("template/header.php");
require_once("bd/conexion.php");

$id = $_GET['id']

?>

<div class="col-lg-12">
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
                <td><button type="button" class="btn btn-primary" value="5" id="enviar">Ver documentos</button></td>
            </tr>
            <tr>
                <td>Practica 2</td>
                <td>Practica 2</td>
                <td>Practica 2</td>
                <td>Practica 2</td>
                <td><button type="button" class="btn btn-primary" value="5" id="enviar">Ver documentos</button></td>
            </tr>
            <tr>
                <td>Practica 3</td>
                <td>Practica 3</td>
                <td>Practica 3</td>
                <td>Practica 3</td>
                <td><button type="button" class="btn btn-primary" value="5" id="enviar">Ver documentos</button></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="documentos_practica" name="documentos_practica" id="documentos_practica">

</div>





<?php
require("template/footer.php");
?>