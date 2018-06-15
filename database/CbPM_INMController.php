<?php

/**
 * CbpfisicasController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>cb_language</b>.
 * Cbidpfisicadeletep_fisicasController class where we group all actions CRUD (Create Read Update Delete),
 * and additional utilities for database table data <b>cb_language</b>.
 * @author Xules Puedes seguirme en mi web http://www.codigoxules.org).
 * You can follow me on my website http://www.codigoxules.org/en
 */
class CbPM_INMController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.plano_m_inm;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    /**
    * Creamos un nuevo idioma con los parámetros pasados.
    * We create a new language with parameters .
    */
    function create($plano,$inmueble){
      $sqlInsert = "INSERT INTO catastro.plano_m_inm (plano,inmueble)"
             . "VALUES (".$plano.",".$inmueble.");";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo 'Error al crear un nuevo elemento en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

    public function listarInmuebles(){
        $query = "SELECT id, nomencla FROM catastro.inmuebles;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

   public function update($id,$inmueble){
    $sqlUpdate = "UPDATE catastro.plano_m_inm SET inmueble = ".$inmueble." WHERE  id  = ".$id.";";
    try {
        $this->cdb->exec($sqlUpdate);
    } catch (PDOException $pdoException) {
        echo $sqlUpdate;
        echo 'Error actualizar un nuevo elemento PersonaFisica en update(...): '.$pdoException->getMessage();
        exit();
    }
   }

   public function obtieneNomencla($idInmueble){
     $query1 = "select nomencla from catastro.inmuebles where id = ".$idInmueble.";";
     $statement = $this->cdb->prepare($query1);
     $statement->execute();
     $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
     return $rows[0]->nomencla;
   }

   public function delete($id){
    $sqlDelete =
        "DELETE FROM catastro.plano_m_inm WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un PersonaFisica en la función delete(...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
