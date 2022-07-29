
<?php

class ControllerProgramas{

#crea un nuevo cliente
public function Crear(){
    
    require_once  ("./Model/actas.php");

    $actas = new Actas();

    #verifica si el boton agregar con el name salvar fue presionado
    if(isset($_POST['btn'])){
        #llama al metodo create
        $actas->create();

        header('location: ./index.php');
    }

}

public function Eliminar(){

    require_once  ("./Model/actas.php");

    $actas = new Actas();

    #verifica si hay una solicitud de tipo de get
    if(isset($_GET['id'])){
        #llama al metodo delete delete
        $actas->delete($_GET['id']);

        header('location: ./index.php');
    }
}

public function VerPrograma(){
    require_once  ("./../Model/programas.php");

    $prog = new Programas();

    foreach ($prog->getAll() as $key => $value) {
        #echo $value;
        echo '<option value="'. $value->ID .'">'.$value->PROGRAMA .'</option>';
    }
}



public function VerProgramas($id){
    require_once  ("./../Model/programas.php");

    $prog = new Programas();

    $prog = $prog->getById($id)[0];
    return $prog;
}


public function Actualizar(){

    require_once  ("./Model/actas.php");

    $actas = new Actas();

    #verifica si hay una solicitud de tipo de get
    if(isset($_POST['Editar'])){
        #llama al metodo delete delete
        $actas->update($_GET['id']);

        header('location: ./index.php');
    }else{
        
        $id = $_GET['id'];

       require_once "./View/actas.php";

    }
    
}

}