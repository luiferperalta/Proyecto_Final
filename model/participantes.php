<?php
include_once('./database/database.php');

class Participantes extends DATABASE{

    //Nombre de la tabla
    private $table = 'participantes';

    //Obtiene todos registros de la tabla
    public function getAll($id){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT us.NOMBRE, us.CARGO, us.CONTACTO
             FROM $this->table JOIN usuario AS us WHERE ACTA_ID = ? AND participantes.USUARIO_ID = us.USUARIO_ID");
            $stm->execute([
                $id
            ]);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    //Obtiene un registro por Id
    public function getById($id){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE USUARIO_ID = ?");
            $stm->execute([$id]);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    //Elimina un registro por Id
    public function delete($id){
        try
        {
            $stm = $this->getConnection()->prepare("DELETE FROM $this->table WHERE USUARIO_ID =?");
            $stm->execute([$id]);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    // Inserta un nuevo registro en la tabla
    public function create(){
        try{
            $stm=$this->getConnection()->prepare("INSERT INTO $this->table 
            (ACTA_ID, USUARIO_ID) VALUES (?,?)");
            
            $stm->execute([
                $_POST['acta_id'],
                $_POST['usuario_id']
            ]);
        }catch(PDOException $e){
        echo $e->getMessage();
        }
      }

      // Actualiza un resgistro por Id
      public function update($id){
        try{
            $stm=$this->getConnection()->prepare("UPDATE $this->table SET NOMBRE = ?,
             CARGO = ? , CONTACTO = ?  WHERE USUARIO_ID = ?");

            $stm->execute([
                $_POST['nombre'],
                $_POST['cargo'],
                $_POST['contacto'],
                $id
        ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }



}
