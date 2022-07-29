<?php

include_once './../Model/mail.php';

class ControllerUsuario
{

    #crea un nuevo cliente
    public function Create()
    {

        require_once("./Model/usuarios.php");

        $Usuario = new Usuarios();

        #verifica si el boton agregar con el name salvar fue presionado
        if (isset($_POST['salvar'])) {
            #llama al metodo create
            $Usuario->create();

            #header('Location: ./login.php' );
            #header('location: /dasboard/View/Usuario.php');
        }
    }


    #actualiza la contraseña por id
    public function UpdatePass()
    {

        require_once("./../Model/Usuarios.php");

        $Usuario = new Usuarios();

        #verifica si hay una solicitud de tipo de get
        if (isset($_POST['btnCambPass'])) {
            #llama al metodo delete delete
            $Usuario->updatePass($_POST['id']);

            header('location: ./login.php?pass');
        }
    }


    public function validacionesCorrectas()
    {
        #verifica que el boton submit sea precionado
        if (isset($_POST['submit'])) {

            #verifica que todas las validaciones sean correctas
            if ($this->validaciones()) {

                $usuarios = new Usuarios();
                $mail = new Mail();

                #inserta los datos en bbdd
                $usuarios->create();

                $mail->activarUserMail($_POST['user']);
                
      /*           echo "
                <div class='alert alert-danger' role='alert'>
                Activar usuario con el correo enviado
                </div> "; */

               /*  echo "<a href='./../index.php'>Volver</a>"; */
                
                #include_once './../View/login.php';

            header('Location: ./../View/login.php?activar=si');

            } else {

                echo "
        <div class='alert alert-danger' role='alert'>
        validaciones incorrectas verificar campos
        </div> ";

                include_once './../View/registro';
            }
        }
    }



    public function validaciones()
    {

        /* VALIDACIONES */

        $cont = 0;

        # Caracteres alphanumericos, prohibe caracteres especiales, max 100 caracteres
        if (preg_match("/^[a-zA-Z0-9_]{3,100}+$/", $_POST['nombre'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            nombre incorrecto
            </div> ";
        }

        #Max 20, interger
        if (preg_match("/^[0-9]{3,20}+$/", $_POST['documento'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            documento incorrecto
            </div> ";
        }

        #Max 20, no caracteres espciales
        if (preg_match("/^[a-zA-Z0-9_]{3,20}+$/", $_POST['user'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            user incorrecto
            </div> ";
        }

        #Max 20,min 6
        if (preg_match("/^[a-zA-Z0-9_]{3,20}+$/", $_POST['pass'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            password incorrecto
            </div> ";
        }

        #Max 20,min 6
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['correo'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            correo incorrecto
            </div> ";
        }

        #integrer
        if (preg_match("/[0-9]/", $_POST['tipo'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            tipo incorrecto
            </div> ";
        }

        #integrer
        if (preg_match("/[0-9]/", $_POST['dependencia'])) {
            $cont += 1;
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            dependecia incorrecto
            </div> ";
        }

        return $cont == 7;
    }






}
