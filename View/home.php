

<!-- HEADER -->

<?php include_once './base/header.php';?>

<!-- CONTENT -->

 <a href="./../index.php" class="mt-5 mx-5 btn btn-danger">Cerrar Sesion</a>

  <div class="container mt-5 d-flex justify-content-end">

    <a href="/desarrollo_web_php/index.php" data-bs-toggle='modal' data-bs-target='#staticBackdrop'
     class="btn btn-primary">Agregar Acta</a>
  </div>
  
  <h1 class="text-center display-4">Actas</h1>

  <div class="container-fluid d-flex justify-content-center my-5">


    <table class="table text-center">
        <thead class="table-dark">

            <tr>
                <th scope="col">N</th>
                <th scope="col">ID</th>
                <th scope="col">ASUNTO</th>
                <th scope="col">ACCION</th>
            </tr>
        </thead>
        <tbody id="table">

        <?php

include_once "./../controller/ControllerActas.php";

$actas = new ControllerActas();

$actas->Read();
    
?>

        </tbody>
    </table>
    </div>

  
     <!-- Inicio Modal Agregar -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Acta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <form action="./ruteador.php?controller=actas&action=create" method="post">
                  
                    <input class="form-control mb-3" type="text" name="asunto" placeholder="Asunto" required>


                    <label for="">Programas    
    
                        <select class=" form-select mb-3" name="programas">
                
                            <?php
                            require_once './../controller/ControllerProgramas.php';

                            $programas = new ControllerProgramas();
                            $programas->VerPrograma();
                            ?>      
                        </select>
                    </label>

                    <label for="">
                        Descripcion
                        <textarea class="form-control mb-3" name="descripcion" id="" cols="60" rows="6"></textarea>
                    </label>

                    <label for="" >Fecha
                    <input class="form-control mb-3 " style="width: 29rem;" type="date" name="fecha"  required>
                    </label>

                    <input class="form-control mb-3" type="text" name="responsable" placeholder="Responsable" required>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <input name="btn" value="Guardar" type="submit" data-bs-dismiss="modal" class="btn btn-primary">
                </div>
    <!-- Fin Modal Editar -->
    </form> 


<!-- FOOTER -->

<?php include_once './base/footer.php';?>