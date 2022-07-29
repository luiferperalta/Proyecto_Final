<?php

class ControllerViews{

    public function Clientes(){
        return"/dasboard/View/Clientes.php";
    }

    public function Dashboard(){
        header('location: /dasboard/View/Dashboard.php');
    }

    public function Facturas(){
        return "/dasboard/View/Facturas.php";
    }

    public function Pagos(){
        return "/dasboard/View/Pagos.php";
    }

    public function Planes(){
        return "/dasboard/View/Planes.php";
    }

    public function CrearFacturas(){
        header("location: /dasboard/View/CrearFacturas.php");
    }

    public function Index(){
        return "/dasboard/index.php";
    }


}

