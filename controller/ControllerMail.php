<?php

class ControllerMail{

    public function recuperacionPassMail(){

        include_once('./../Model/mail.php');
        include_once('./../Model/usuarios.php');
        

        $mail = new Mail();
        $user = new Usuarios();

         #verifica si el boton agregar con el name salvar fue presionado
         if(isset($_POST['btnRecuperacionPass'])){
            
            #verifica si el correo ingresado se encuentra en la base de datos
            if($user->getByMail($_POST['correo'])->CORREO== $_POST['correo']){

                $cod = $this->generarNumAlet();
                $id = $user->getByMail($_POST['correo'])->ID;

                #enviar correo de recuperacion al correo ingresado
                $mail->recuperacionPassMail($cod,$user->getByMail($_POST['correo'])->USERNAME);

                #redireciona a vista del codigo de recuperacion
                header('Location: ./codigo.php?cod='.$cod.'&id='.$id.'');
            }else{
                echo "no funciona recuperacion password";
            }

        }

    }

    #verifica que el codigo sea igual al que se envia en el correo
    public function verificacionCodAlet() {
        /* 
        include_once('./Model/usuarios.php');
        
        $user = new Usuarios();
 */
         #verifica si el boton agregar con el name salvar fue presionado
         if(isset($_POST['btnCodigo'])){
   
            #verifica si el codigo ingresado es el enviado al correo
            if($_POST['codigo']== $_POST['cod']){

                header('location: ./cambioPass.php?id='.$_POST
                ['id'].'' );
                
            }else{
                echo "el codigo enviado no coincide";
            }

        }

    }

     #generar un string de 6 numeros aleatoreos entre 0-9
     function generarNumAlet(){
        
        $valores = "";
        $max_num = 6;

        for ($x=0;$x<$max_num;$x++) {
            $num_aleatorio = rand(0,9);
            $valores.=$num_aleatorio;
        }

        #print_r($valores);
        #var_dump($valores) 
        return $valores;
    }

    function activarUser(){
        
        include_once './../Model/mail.php';

        $mail = new Mail();

        $mail->activarUser($_GET['key']);
    }


}