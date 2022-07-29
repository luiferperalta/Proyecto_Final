<?php
include_once('./../database/database.php');

class Actas extends DATABASE{

    //Nombre de la tabla
    private $table = 'acta';

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
            $con = $this->getConnection();
            $stm=$con->prepare("INSERT INTO $this->table (ASUNTO,FECHA,DESCRIPCION,RESPONSABLE,PROGRAMA_ID) VALUES (?,?,?,?,?)");
            
            $stm->execute([
                $_POST['asunto'],
                $_POST['fecha'],
                $_POST['descripcion'],
                $_POST['responsable'],
                $_POST['programas']
            ]);
        }catch(PDOException $e){
        echo $e->getMessage();
        }
        return $con->lastInsertId();
      }

      // Actualiza un resgistro por Id
      public function update($id){
        try{
            $stm=$this->getConnection()->prepare("UPDATE $this->table SET TEMA = ?, CITADA_POR = ? , HORA_INICIO = ? ,
             HORA_FIN = ? ,FECHA = ?, PRESIDENTE = ? , LUGAR = ? , ORDEN_DIA = ? WHERE N_ACTA = ?");

            $stm->execute([
                $_POST['tema'],
                $_POST['citada'],
                $_POST['hora_inicio'],
                $_POST['hora_fin'],
                $_POST['fecha'],
                $_POST['presidente'],
                $_POST['lugar'],
                $_POST['ordendia'],
                $id
        ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }




}
