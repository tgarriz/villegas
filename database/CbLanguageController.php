<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>cb_language</b>.
 * CbLanguageController class where we group all actions CRUD (Create Read Update Delete), 
 * and additional utilities for database table data <b>cb_language</b>.
 * @author Xules Puedes seguirme en mi web http://www.codigoxules.org).
 * You can follow me on my website http://www.codigoxules.org/en
 */
class CbLanguageController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM cb_language;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }

    /**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $idlanguage
 * @param type $namelanguage
 * @param type $isactive
 * @param type $languageiso
 * @param type $countrycode
 * @param type $isbaselanguage
 * @param type $issystemlanguage
 */
    function create($idlanguage, $namelanguage, $isactive, $languageiso, $countrycode, $isbaselanguage, $issystemlanguage){ 
      $sqlInsert = "INSERT INTO cb_language(idlanguage, namelanguage, isactive, languageiso, countrycode, isbaselanguage, issystemlanguage)"
             . "    VALUES ('".$idlanguage."', '".$namelanguage."', '".$isactive."', '".$languageiso."', '".$countrycode."', '".$isbaselanguage."', '".$issystemlanguage."')";
      try {             
        $this->cdb->exec($sqlInsert);      
      } catch (PDOException $pdoException) {            
        echo 'Error crear un nuevo elemento cb_language en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

   /**
 * Actualizamos los valores del idioma que pasamos en el parámetro $idlanguage.
 * We update the values of the language we passed on the $idlanguage parameter.
 * @param type $idlanguage
 * @param type $namelanguage
 * @param type $isactive
 * @param type $languageiso
 * @param type $countrycode
 * @param type $isbaselanguage
 * @param type $issystemlanguage
 */
   public function update($idlanguage, $namelanguage, $isactive, $languageiso, $countrycode, $isbaselanguage, $issystemlanguage){        
    $sqlUpdate = "UPDATE cb_language "
            . "     SET namelanguage    = '".$namelanguage."', "
            . "         isactive        = '".$isactive."', "
            . "         languageiso     = '".$languageiso."', "
            . "         countrycode     = '".$countrycode."', "
            . "         isbaselanguage  = '".$isbaselanguage."', "
            . "         issystemlanguage = '".$issystemlanguage."'"
            . "     WHERE   idlanguage  = '".$idlanguage."'";
    try {                         
        $this->cdb->exec($sqlUpdate);      
    } catch (PDOException $pdoException) {            
        echo 'Error actualizar un nuevo elemento cb_language en update(...): '.$pdoException->getMessage();
        exit();
    }
   }

/**
 * Eliminamos el idioma que pasamos como parámetro.
 * We remove the language that we as a parameter.
 * @param type $idlanguage
 */
   public function delete($idlanguage){ 
    $sqlDelete = 
        "DELETE FROM cb_language"
        . "     WHERE   idlanguage = '".$idlanguage."'"; 
    try {             
        $this->cdb->exec($sqlDelete);      
    } catch (Exception $exception) {            
        echo 'Error al eliminar un idioma en la función delete(...): '.$exception->getMessage();
        exit();
    }
   } 
}
?>
