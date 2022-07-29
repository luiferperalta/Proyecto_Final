<?php
    echo " <link rel='stylesheet' href='./assets/style/style.css'>";
    include_once './base/header.php';
    
?>
    
    <section class="form-register">
    <form action="./ruteador.php?controller=Usuario&action=validacionesCorrectas" method="POST" >
        <h4>Formulario Registro</h4>

        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre" required>
        <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" >
        <input class="controls" type="number" name="documento" id="documento" placeholder="Numero de documento">
      
        <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" >
        
<select class="controls" name="tipo" id="tipo">
    <option value="">--Tipo --</option>
    <option value="2">ADMINISTRATIVO</option>
    <option value="1">PROFESOR</option>
</select>
        <input class="controls" type="text" name="user" id="user" placeholder="Ingrese el usuario"  >
     
        <input class="controls" type="password" name="pass" id="pass" placeholder="Ingrese la contraseña"  >
            
        <select class="controls" name="dependencia" id="dependencia">
    <option value="">--Dependencia --</option>
    <option value="1">FACULTADA DE INGENIERIA</option>
    <option value="2">ADMIN EN SALUD</option>
</select>

        <input name="submit" class="botons" type="submit" value="enviar" id="submit" > 


    </form>
</section>

<!-- footer -->

<?php
    include_once './base/footer.php';

?>