<?php

include_once('./../database/database.php');
include_once('./../Model/usuarios.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail extends DATABASE{
    private $correo ;
    private $pass ;
    private $host ;

    public function __construct(){
        $this->host     = 'smtp.gmail.com';
        $this->correo   = 'jooge199813@gmail.com';
        $this->pass     = 'prgafewesobcyubn';
    }


    #envia correo de activacion de usuario 
    public function activarUserMail($user)
    {
        //Load Composer's autoloader
        require './../vendor/autoload.php';
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->host;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->correo;                     //SMTP username
            $mail->Password   = $this->pass;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            $usuario = new Usuarios();
            
            //Recipients
            $mail->setFrom($this->correo, 'Gestor de Cuentas');
            $mail->addAddress($usuario->getByUser($user)->CORREO);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Correo de Activacion de Usuario';
            $mail->Body    = '<b> Mensaje de Registro </b>';
            $mail->Body    .= '<br>Click en enlace para activar el usuario';
            $mail->Body  .= '<br> <a href="http://'.$_SERVER["SERVER_NAME"].'/Proyeto_Final/View/ruteador.php?controller=Mail&action=activarUser&key=' . $usuario->getByUser($user)->PASSWORD . '>Enlace de Verificacion</a>  ';
            #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Mensaje enviado';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }


    #envia correo de recuperacion de contraseña 
    public function recuperacionPassMail($cod,$user) {

        //Load Composer's autoloader
        require './../vendor/autoload.php';
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->host;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->correo;                     //SMTP username
            $mail->Password   = $this->pass;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $usuario = new Usuarios();

            //Recipients
            $mail->setFrom($this->correo, 'Gestor de Cuentas');
            $mail->addAddress($usuario->getByUser($user)->CORREO);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Recuperacion de Contraseña';
            $mail->Body   = '<b> Codigo de Recuperacion </b>';
            $mail->Body  .= '<br>Digite los 6 digitos en la pagina de recuperacion ';
            $mail->Body  .= '<b> '. $cod .' </b>';
            #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Mensaje de recuperacion enviado';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function activarUser($key){
        $user = new Usuarios();

        #verifica que la contraseña encryptada sea la misma 
        if ($user->getByPass($key)->PASSWORD == $key) {

            #actualiza el estado del usuario por id
            $user->updateEstado($user->getByPass($key)->ID);

            #echo "usuario Activo";

            header('Location: ./login.php?activo=si');
            
        }else{
            echo "La contraseña no coincide";
        } 
    }

   
}