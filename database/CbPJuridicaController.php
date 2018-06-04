<?php
/**
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * @author Xules Puedes seguirme en mi web http://www.codigoxules.org).
 * You can follow me on my website http://www.codigoxules.org/en
 */
class CbPJuridicaController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.p_juridicas;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
/**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $rsocial
 * @param type $domicilio
 * @param type $cuit
 */
    function create($rsocial,$domicilio,$cuit){
      $sqlInsert = "INSERT INTO catastro.p_juridicas(rsocial,domicilio,cuit)"
             . "    VALUES ('".$rsocial."', '".$domicilio."', '".$cuit."' )";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo 'Error al crear un nuevo elemento Persona Juridica en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

/**
 * Actualizamos los valores.
 * @param type $id
 * @param type $rsocial
 * @param type $domicilio
 * @param type $cuit
 */
   public function update($id,$rsocial,$domicilio,$cuit){
    $sqlUpdate = "UPDATE catastro.p_juridicas SET rsocial = '".$rsocial."', domicilio = '".$domicilio."', cuit = '".$cuit."' WHERE  id  = ".$id.";";
    try {
        $this->cdb->exec($sqlUpdate);
    } catch (PDOException $pdoException) {
        echo $sqlUpdate;
        echo 'Error actualizar un nuevo elemento PersonaJuridica en update(...): '.$pdoException->getMessage();
        exit();
    }
   }

/**
 * Eliminamos Persona Juridica.
 * @param type $id
 */
   public function delete($id){
    $sqlDelete =
        "DELETE FROM catastro.p_juridicas WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un PersonaFisica en la función delete(...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
