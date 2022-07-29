
<?php

class ControllerCompromisos{

#crea un nuevo cliente
public function Crear(){
    
    require_once  ("./../model/compromisos.php");

    $comp = new Compromisos();

    #verifica si el boton agregar con el name salvar fue presionado
    if(isset($_POST['submit'])){
        #llama al metodo create
        $comp->create();

        header('location: ./CrearCompromisos.php?alert=si&id='.$_GET['id']);
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

public function VerProgramas(){
    require_once  ("./Model/programas.php");

    $prog = new Programas();

    foreach ($prog->getAll() as $key => $value) {
        #echo $value;
        echo '<option value="'. $value->ID .'">'.$value->PROGRAMA .'</option>';
    }
}

public function VerCompromisos($id){
    require_once  ("./../Model/compromisos.php");

    $com = new Compromisos();

    $com = $com->getById($id)[0];
    return $com;
}


public function Ver($id){
    require_once  ("./../Model/compromisos.php");

    $com = new Compromisos();
    $con = $com->getById($id);

    $i = 1;

    for ($i=0; $i < count($com->getById($id)); $i++) { 
        echo "<tr><td>" . $con[$i]->DESCRIPCION . "</td>"
        . "<td>" . $con[$i]->FECHA_INIC . "</td>"
        . "<td>" . $con[$i]->FECHA_FIN . "</td>"
        . "<td>" . $con[$i]->RESPONSABLE . "</td></tr>";
  
        
    }
    #recorre todos los datos en la base de datos
    

    
  
}


}