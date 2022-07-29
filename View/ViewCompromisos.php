<!-- HEADER -->

<?php include_once './base/header.php';?>


<div class="container mt-5">


<h1>Compromisos</h1>


<div class="container d-flex justify-content-center my-5">


<table class="table text-center">
    <thead class="table-success">

        <tr>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">FECHA INICIO</th>
            <th scope="col">FECHA FIN</th>
            <th scope="col">RESPONSABLE</th>
        </tr>
    </thead>
    <tbody id="table">

    <?php
require_once './../controller/ControllerCompromisos.php';
$con = new ControllerCompromisos();
$con->Ver($_GET['id']);
?>

    </tbody>
</table>
</div>

</div>




<!-- FOOTER -->

<?php include_once './base/footer.php';?>