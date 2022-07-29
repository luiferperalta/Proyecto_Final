
<?php

class ControllerActas{

#crea un nuevo cliente
public function Create(){
    
    require_once  ("./../Model/actas.php");

    $actas = new Actas();

    #verifica si el boton agregar con el name salvar fue presionado
    if(isset($_POST['btn'])){
        #llama al metodo create

        header('location: ./CrearCompromisos.php?id='.$actas->create());
    }

}

public function Delete(){

    require_once  ("./../Model/actas.php");

    $actas = new Actas();

    #verifica si hay una solicitud de tipo de get
    if(isset($_GET['id'])){
        #llama al metodo delete delete
        $actas->delete($_GET['id']);

        header('location: ./home.php');
    }
}

public function Read(){
    require_once  ("./../Model/actas.php");

    $actas = new Actas();

    $i = 1;
    #recorre todos los datos en la base de datos
    
    foreach ($actas->getAll() as $key => $value) {

      echo 
      "<tr><td>" . $i . "</td>"
      . "<td>" . $value->ID . "</td>"
      . "<td>" . $value->ASUNTO . "</td>"
      . "<td>
       <div class='d-flex justify-content-center'>

      <a href='./ruteador.php?controller=actas&action=delete&id=$value->ID' class='btn btn-danger mx-2'>ELIMINAR</a> 

      <a href='./ruteador.php?controller=actas&action=VerActa&id=$value->ID' class='btn btn-primary mx-2' > DATOS</a>

      <a href='./ViewCompromisos.php?id=$value->ID' 
      class='btn btn-success'>COMPROMISOS</a> 
    
      </div>
      </td></tr>";
      $i++;
  }
}



public function ViewRead(){
    require_once  ("./Model/actas.php");
    require_once  ("./Model/participantes.php");

    $actas = new Actas();

    $participantes = new Participantes();

    require_once  ("./View/Viewactas.php");

}


public function Update(){

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


public function InfoActa($id){
    require_once  ("./../Model/actas.php");

    $actas = new Actas();

    $act = $actas->getById($id)[0];
    return $act;
}

public function VerActa(){

    require_once  ("./../Model/actas.php");

    $actas = new Actas();
    

    require_once  ("./../View/ViewActas.php");

}

}