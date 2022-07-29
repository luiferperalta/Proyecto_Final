<?php

/* base de datos */


echo " <style>

.col , .col-1{
    border: 1px solid black;
}
</style>";

include_once './base/header.php';
include_once './../controller/ControllerProgramas.php';

?>

   
<!-- CONTENT -->


  <div class="container my-5">

    <div class="row text-center" style="background-color: gray;">
        <div class="col py-2">

        ACTA DE REUNIÓN DE TRABAJO
        </div>

    </div>

    <?php  foreach ($actas->getById($_GET['id']) as $key => $value){ ?>    

    <div class="row " >
        <div class="col py-2">
        Asunto: 
        <?php echo $value->ASUNTO ?>
        </div>
        <div class="col py-2">
<strong>
         N Acta: </strong><?php echo $value->ID ?>

        </div>

    </div>

    <div class="row ">
        <div class="col py-2">

        Responsable: <?php echo $value->RESPONSABLE ?>
        </div>
        <div class="col py-2">

        Fecha:  <?php echo $value->FECHA ?>
        </div>
     

    </div>

    <div class="row ">
    <div class="col py-2">
            <strong> PROGRAMA: </strong>
         <?php  $pro = new ControllerProgramas();
         echo $pro->VerProgramas($value->PROGRAMA_ID)->PROGRAMA  ?>
        </div>

        </div>
<!-- footer -->

<?php
    };
include_once './base/footer.php';

?>