<?php

/**
 * CbProductorController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>cb_language</b>.
 * CbProductorController class where we group all actions CRUD (Create Read Update Delete),
 * and additional utilities for database table data <b>cb_language</b>.
 * @author Xules Puedes seguirme en mi web http://www.codigoxules.org).
 * You can follow me on my website http://www.codigoxules.org/en
 */
class CbDerechoController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM mineria.tipo_derecho;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    /**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $id
 * @param type $codigo
 * @param type $descripcion
 */
    function create($codigo, $descripcion){
      $sqlInsert = "INSERT INTO mineria.tipo_derecho(codigo, descripcion)"
             . "    VALUES (".$codigo.", '".$descripcion."')";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo 'Error crear un nuevo elemento derecho en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

   /**
 * Actualizamos los valores del idioma que pasamos en el parámetro $idlanguage.
 * We update the values of the language we passed on the $idlanguage parameter.
 * @param type $id
 * @param type $codigo
 * @param type $descripcion
 */
   public function update($codigo, $descripcion, $id){
    $sqlUpdate = "UPDATE mineria.tipo_derecho SET codigo = ".$codigo.", descripcion = '".$descripcion."' WHERE  id  = ".$id.";";
    try {
        $this->cdb->exec($sqlUpdate);
    } catch (PDOException $pdoException) {
        echo $sqlUpdate;
        echo 'Error actualizar un nuevo elemento derecho en update(...): '.$pdoException->getMessage();
        exit();
    }
   }

/**
 * Eliminamos el idioma que pasamos como parámetro.
 * We remove the language that we as a parameter.
 * @param type $id
 */
   public function delete($id){
    $sqlDelete =
        "DELETE FROM mineria.tipo_derecho WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un derecho en la función delete(...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
