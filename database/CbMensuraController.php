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
class CbMensuraController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.mensuras;";
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


    /**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $id
 * @param type $profesional
 * @param type $objetos
 * @param type $secuencia
 * @param type $anio
 */
    function create($profesional,$objetos,$secuencia,$anio){
      $sqlInsert = "INSERT INTO catastro.mensuras(profesional,objetos,secuencia,anio)"
             . " VALUES (".$profesional.", '".$objetos."', ".$secuencia.", ".$anio.")";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo 'Error al crear un nuevo registro en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

   /**
 * Actualizamos los valores.
 * @param type $id
 * @param type $profesional
 * @param type $objetos
 * @param type $secuencia
 * @param type $anio
 */
   public function update($id,$profesional,$objetos,$secuencia,$anio){
    $sqlUpdate = "UPDATE catastro.mensuras SET profesional = ".$profesional.", objetos = '".$objetos."', secuencia = ".$secuencia.", anio = ".$anio.";";
    try {
        $this->cdb->exec($sqlUpdate);
    } catch (PDOException $pdoException) {
        echo $sqlUpdate;
        echo 'Error actualizar un nuevo registro (...): '.$pdoException->getMessage();
        exit();
    }
   }

/**
 * Eliminamos Persona Fisica.
 * @param type $id
 */
   public function delete($id){
    $sqlDelete =
        "DELETE FROM catastro.mensuras WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un registro (...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
