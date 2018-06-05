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
class CbProfesionalController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.profesionales;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }


    /**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $nombre
 * @param type $apellido
 * @param type $tipo_doc
 * @param type $nro_doc
 * @param type $domicilio
 * @param type $matricula
 * @param type $profesion
 * @param type $mail
 * @param type $celular
 * @param type $cuit
 */
    function create($nombre,$apellido,$tipo_doc,$nro_doc,$domicilio,$matricula,$profesion,$mail,$celular,$cuit){
      $sqlInsert = "INSERT INTO catastro.profesionales(nombre,apellido,tipo_doc,nro_doc,domicilio,matricula,profesion,mail,celular,cuit)"
             . " VALUES ('".$nombre."','".$apellido."','".$tipo_doc."',".$nro_doc.",'".$domicilio."',".$matricula.",'".$profesion."','".$mail."','".$celular."','".$cuit."' )";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo ($sqlInsert);
        echo 'Error al crear un nuevo elemento Profesionales en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

   /**
 * Actualizamos los valores.
 * @param type $id
 * @param type $nombre
 * @param type $apellido
 * @param type $tipo_doc
 * @param type $nro_doc
 * @param type $domicilio
 * @param type $matricula
 * @param type $profesion
 * @param type $mail
 * @param type $celular
 * @param type $cuit
 */
   public function update($id,$nombre,$apellido,$tipo_doc,$nro_doc,$domicilio,$matricula,$profesion,$mail,$celular,$cuit){
    $sqlUpdate = "UPDATE catastro.profesionales SET nombre = '".$nombre."', apellido = '".$apellido."', tipo_doc = '".$tipo_doc."', nro_doc = '".$nro_doc."', domicilio = '".$domicilio."', matricula = ".$matricula.", profesion = '".$profesion."', mail = '".$mail."', celular = '".$celular."', cuit = '".$cuit."' WHERE  id  = ".$id.";";
    try {
        $this->cdb->exec($sqlUpdate);
    } catch (PDOException $pdoException) {
        echo $sqlUpdate;
        echo 'Error actualizar un nuevo elemento Profesionales en update(...): '.$pdoException->getMessage();
        exit();
    }
   }

/**
 * Eliminamos Persona Fisica.
 * @param type $id
 */
   public function delete($id){
    $sqlDelete =
        "DELETE FROM catastro.profesionales WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un Profesionales en la función delete(...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
