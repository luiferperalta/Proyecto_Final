<?php 


#estilos
echo "<style>
  body{
      background-color: #F7FAFC;
  }

  .container {
      width: 50% !important;
      height: 80vh;
      background-color: #FFFFFF;
      border-radius: 0.9rem;
  }
</style>";


include_once './base/header.php';
  
?>


    <div class="container mt-5 d-flex justify-content-center align-items-center text-center">

        <form action="./ruteador.php?controller=Mail&action=recuperacionPassMail" method="POST" enctype="multipart/form-data">


            <h4 class="mb-3 ">RECUPERACION CONTRASEÑA</h4>

            <input class="form-control mb-3" type="mail" name="correo" placeholder="Correo" required>

            <input class="btn btn-primary mb-3" name="btnRecuperacionPass" type="submit" value="Recuperar" id="submit" > 

        </form>
    </div>



<?php
include_once './base/footer.php';
?>