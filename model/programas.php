<?php
include_once('./../database/database.php');

class Programas extends DATABASE{

    //Nombre de la tabla
    private $table = 'programa';

    //Obtiene todos registros de la tabla
    public function getAll(){
        try
        {
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();
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
            $stm = $this->getConnection()->prepare("SELECT * FROM $this->table WHERE ID= ?");
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
            $stm = $this->getConnection()->prepare("DELETE FROM $this->table WHERE ID=?");
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
            $stm=$this->getConnection()->prepare("INSERT INTO $this->table (TEMA, FECHA, HORA_INICIAL, HORA_FINAL,
             OBJETIVO, DESARROLLO,LUGAR) VALUES (?,?,?,?,?,?,?)");
            
            $stm->execute([
                $_POST['tema'],
                $_POST['fecha'],
                $_POST['hora_inicial'],
                $_POST['hora_final'],
                $_POST['objetivo'],
                $_POST['desarrollo'],
                $_POST['lugar'],
            ]);
        }catch(PDOException $e){
        echo $e->getMessage();
        }
      }

      // Actualiza un resgistro por Id
      public function update($id){
        try{
            $stm=$this->getConnection()->prepare("UPDATE $this->table SET TEMA = ?, FECHA = ? , HORA_INICIAL = ? ,
             HORA_FINAL = ? ,OBJETIVO = ?, DESARROLLO = ? , LUGAR = ? WHERE ID = ?");

            $stm->execute([
                $_POST['tema'],
                $_POST['fecha'],
                $_POST['hora_inicial'],
                $_POST['hora_final'],
                $_POST['objetivo'],
                $_POST['desarrollo'],
                $_POST['lugar'],
                $id
        ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }




}
