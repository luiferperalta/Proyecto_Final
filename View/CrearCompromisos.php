<?php
    echo " <link rel='stylesheet' href='./assets/style/style.css'>";
    include_once './base/header.php';
    
?>
    
    <section class="form-register my-5">
    <form action="./ruteador.php?controller=Compromisos&action=crear&id=<?php echo $_GET['id']?>" method="POST" >

    <?php echo isset($_GET['alert'])?  "<div class='alert alert-success' role='alert'>         COMPROMISO CREADO
            </div> " : ''?>

        <div class="mb-4 border p-2">
            <h2 class="text-center">Informacion del Acta</h2>
                    <br>
                    <?php

                    require_once './../Controller/controllerActas.php';
                    $acta = new ControllerActas();
                    $act = $acta->InfoActa($_GET['id']);
                    
                    echo '<strong>Asunto :</strong> ' .$act->ASUNTO  . '</br><strong>Descripcion :</strong>  ' . $act->DESCRIPCION .
                    '</br><strong>Fecha :</strong> ' .$act->FECHA .
                    '</br><strong>Responsable :</strong> ' .$act->RESPONSABLE;

                    ?>
        </div>

        <h4>Compromisos</h4>

        <input class="controls" type="text" name="descripcion" id="nombre" placeholder="Descripcion" required>
      

        <label for="" >Fecha Inicio
                    <input class="controls mb-3 " type="date" name="fecha_inicio"  required>
        </label>

        
        <label for="" >Fecha Fin
                    <input class="controls mb-3 " type="date" name="fecha_fin"  required>
        </label>
      
      
        <input class="controls" type="text" name="responsable" id="correo" placeholder="Responsable" >
        
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

        <input name="submit" class="botons" type="submit" value="enviar" id="submit" > 

        <a class="btn btn-success" style="width:21.3rem;"  href="./home.php">Terminar</a>

    </form>
</section>

<!-- footer -->

<?php
    include_once './base/footer.php';

?>