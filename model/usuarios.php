<?php
include_once('./../database/database.php');

class Usuarios extends DATABASE{

    //Nombre de la tabla
    private $table = 'usuarios';

    //Obtiene todos registros de la tabla
    public function getAll()
    {
        try {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Obtiene un registro por Id
    public function getById($id)
    {
        try {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE ID= ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Elimina un registro por Id
    public function delete($id)
    {
        try {
            $stm = $this->getConnection()->prepare("DELETE FROM $this->table WHERE id=?");
            $stm->execute([$id]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Inserta un nuevo registro en la tabla
    public function create()
    {
        try {
            $stm = $this->getConnection()->prepare("INSERT INTO $this->table ( `NOMBRES`, `APELLIDOS`, `CORREO`, `USERNAME`, `PASSWORD`,  `TIPO_USUARIO_PK`, `DEPENDENCIA_PK`, `IDENTIFICACION`) VALUES (?,?,?,?,?,?,?,?)");

            $stm->execute([
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['correo'],
                $_POST['user'],
                password_hash($_POST['pass'], PASSWORD_BCRYPT),
                $_POST['tipo'],
                $_POST['dependencia'],
                $_POST['documento']
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Actualiza un resgistro por Id
    public function update($id)
    {
        try {
            $stm = $this->getConnection()->prepare("UPDATE $this->table SET NOMBRE= ? , TIPO_IDENTIDAD = ?, NUM_IDENTIDAD = ? ,CEL= ?,EMAIL= ?,DIRECCION= ? WHERE ID = ?");

            $stm->execute([
                $_POST['nombre'],
                $_POST['t_ident'],
                $_POST['n_ident'],
                $_POST['cel'],
                $_POST['email'],
                $_POST['address'],
                $id,

            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


#cambia la contraseña por id
    public function updatePass($id)    {
        try {
            $stm = $this->getConnection()->prepare("UPDATE $this->table SET PASSWORD = ? WHERE ID = ?");

            $stm->execute([
                password_hash($_POST['password'], PASSWORD_BCRYPT),
                $id,

            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Obtiene un registro por correo
    public function getByMail($mail)
    {
        try {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE CORREO= ?");
            $stm->execute(
                [$mail]
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Obtiene un registro por usuario
    public function getByUser($user)
    {
        try {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE USERNAME= ?");
            $stm->execute(
                [$user]
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    //Obtiene un registro por password
    public function getByPass($user)
    {
        try {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE PASSWORD= ?");
            $stm->execute(
                [$user]
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    
#cambia estado a activo
public function updateEstado($id)    {
    try {
        $stm = $this->getConnection()->prepare("UPDATE $this->table SET ACTIVO = ? WHERE ID = ?");

        $stm->execute([
            1,
            $id,

        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

}
