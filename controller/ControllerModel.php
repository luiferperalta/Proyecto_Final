<?php

class ControllerModel{


    public function Login(){
        include_once('./../Model/login.php');
        $login = new Login();
        $login->session_login();
    }

}

