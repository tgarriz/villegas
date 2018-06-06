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
class CbPObraController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.planos_obra;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    public function readProfesionales(){
        $query = "SELECT id,nombre,apellido FROM catastro.profesionales;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    public function readNameProfesional($idProf){
        $query = "SELECT nombre,apellido FROM catastro.profesionales WHERE id = ".$idProf.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows[0];
    }


    /**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $profesional
 * @param type $sup_cubierta
 * @param type $sup_semicub
 * @param type $sup_demoler
 * @param type $codigo
 */
    function create($profesional,$sup_cubierta,$sup_semicub,$sup_demoler,$codigo){
      $sqlInsert = "INSERT INTO catastro.planos_obra(profesional,sup_cubierta,sup_semicub,sup_demoler,codigo)"
             . " VALUES ('".$profesional."','".$sup_cubierta."','".$sup_semicub."','".$sup_demoler."','".$codigo."');";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo ($sqlInsert);
        echo 'Error al crear un nuevo elemento en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

   /**
 * Actualizamos los valores.
 * @param type $profesional
 * @param type $sup_cubierta
 * @param type $sup_semicub
 * @param type $sup_demoler
 * @param type $codigo
 */
   public function update($id,$profesional,$sup_cubierta,$sup_semicub,$sup_demoler,$codigo){
    $sqlUpdate = "UPDATE catastro.planos_obra SET profesional = '".$profesional."', sup_cubierta = '".$sup_cubierta."', sup_semicub = '".$sup_semicub."', sup_demoler = '".$sup_demoler."', codigo = '".$codigo."' WHERE  id  = ".$id.";";
    try {
        $this->cdb->exec($sqlUpdate);
    } catch (PDOException $pdoException) {
        echo $sqlUpdate;
        echo ' - Error actualizar un nuevo elemento en update(...): '.$pdoException->getMessage();
        exit();
    }
   }

/**
 * Eliminamos Persona Fisica.
 * @param type $id
 */
   public function delete($id){
    $sqlDelete =
        "DELETE FROM catastro.planos_obra WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un en la función delete(...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
