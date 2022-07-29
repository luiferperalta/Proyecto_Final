
<?php

include_once('./../database/database.php');

class Login extends DATABASE
{


    function session_login()
    {

        #inicia una session o reanuda la existente
        session_start();

        #verifica si existe alguna session
        if (isset($_SESSION['rol'])) {
            switch ($_SESSION['rol']) {
                    #si la session tiene el valor de 1 envia a la vista Admin
                case 1:
                    $this->Controllers->Dashboard();
                    break;
                    #si la session tiene el valor de 2 envia a la vista Empleado
                case 2:
                    $this->Controllers->Dashboard();
                    break;
            }
        } else {
            $this->recibe_Datos();
        }
    }


    function recibe_Datos()    {

        #valida el usuario y la contraseña
        if (isset($_POST['username']) && isset($_POST['password'])) {

            #verifica si existe un registro con ese usuario y contraseña
            if ($this->checkdate()) {

                #verifica que el usuario este activo al darle en link generado al registrarse
                if ($this->verificar_User()[9] == 0) {
            
                    echo "<div class='alert alert-danger' role='alert'>
                        Nombre de usuario o contraseña no activo
                        </div> ";

                    include_once './View/login.php';
                } else {

                    #var_dump($this->verificar_User());

                    #guarda el contenido de la fila 4 de la base de datos en la variable rol, empezando de 0
                    #crea una session con el paramatro rol 
                    $_SESSION['tipo'] = $this->verificar_User()[6];
                    #crea una session con el paramatro user 
                    $_SESSION['user'] = $this->verificar_User()[1];

                    #verifica el rol del usuario logeado
                    switch ($_SESSION['tipo'])
                    {
                            #admin
                        case 1:
                            header('Location: ./home.php');
                            #echo "Login correcto,Bienvenido PROFESOR";
                            break;
                            #empleado
                        case 2:
                            header('Location: ./home.php');
                            
                            #echo "Login correcto,Bienvenido ADMINISTRATIVO";
                            break;
                    }
                    
                } 
            }else {

                header('Location: ./login.php?incorrecta');
                    // no existe el usuario
                   

                    #include_once './../View/login.php';
                }
            }
    }
    

    // verifica que los el usuario y la contraseña se encuentren en la bd
    function verificar_User()
    {

        #instancia la clase database
        $db = new Database();

        #realiza la consulta a la base de datos
        $query = $db->getConnection()->prepare('SELECT * FROM USUARIOS WHERE USERNAME = ?');

        $query->execute([
            $_POST['username'],
        ]);

        #ejecuta la consulta
        $row = $query->fetch(PDO::FETCH_NUM);

        #devuelve el registro que coincida con la consulta
        return $row;
    }



 // verifica si el usuario y password son correctos
    public function checkdate()
    {       
 
        $query = $this->getConnection()->prepare('SELECT * FROM USUARIOS WHERE USERNAME = ?');
        $query->execute([
            $_POST['username']
        ]);

        $row = $query->fetch(pdo::FETCH_ASSOC);
        
        #verifica si existe el usuario
        if ($row) {
            #devuelve true si la contraseña enviada es la misma de la bbdd
            return password_verify($_POST['password'], $row['PASSWORD']);
        } else {
            return $row;
        }
        
    }
}
