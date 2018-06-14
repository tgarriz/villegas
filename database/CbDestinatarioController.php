<?php


class CbDestinatarioController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.destinatarios_tasa;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    public function listarPersonas(){
        $query = "SELECT id, string_agg(nombre, apellido) as nombre FROM catastro.p_fisicas group by id
                  union
                  SELECT id, (rsocial) as nombre FROM catastro.p_juridicas group by id;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }
    /**
    * Creamos un nuevo idioma con los parámetros pasados.
    * We create a new language with parameters .
    * @param type $id
    */
    public function obtieneTipo($idPersona){
        $query1 = "select count(*) as res from catastro.p_fisicas where id = ".$idPersona.";";
        $statement = $this->cdb->prepare($query1);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        if ($rows[0]->res == 1) {
          return 'F';
        }
        else { return 'J';}
    }

    public function obtieneTipoPorDest($idDestinatario){
      $query1 = "select * from catastro.destinatarios_tasa where id = ".$idDestinatario.";";
      $statement = $this->cdb->prepare($query1);
      $statement->execute();
      $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
      if ($rows[0]->pfisica == null){
        return 'J';
      }
      else {
        return 'F';
      }
    }

    /**
    * Creamos un nuevo idioma con los parámetros pasados.
    * We create a new language with parameters .
    * @param type $id
    */
    public function obtieneNombre($idPersona){
        $tipo = $this->obtieneTipo($idPersona);
        if ($tipo == 'F') {
          $query = "select (apellido,nombre) as nombre from catastro.p_fisicas where id = ".$idPersona.";";
          $statement = $this->cdb->prepare($query);
          $statement->execute();
          $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
          return $rows[0]->nombre;
        }
        else {
          $query = "select (rsocial) as nombre from catastro.p_juridicas where id = ".$idPersona.";";
          $statement = $this->cdb->prepare($query);
          $statement->execute();
          $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
          return $rows[0]->nombre;
        }
    }
    /*obtiene el nombre de la persona recibiendo el tipo de persona y el id de persona*/
    public function obtieneNombreConTipo($idPersona,$tipo){
      if ($tipo == 'F') {
        $query = "select (apellido, nombre) as nombre from catastro.p_fisicas where id = ".$idPersona.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows[0]->nombre;
      }
      else {
        $query = "select (rsocial) as nombre from catastro.p_juridicas where id = ".$idPersona.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows[0]->nombre;
      }
    }

    /*Devuelve true si el Destinatario ya existe sobre el inmueble seleccionado*/
    public function existeDestinatario($tipo,$idInmueble,$idPersona){
      if ($tipo == 'F') {
        $query1 = "select count(*) as res from catastro.destinatarios_tasa where pfisica = ".$idPersona." and inmueble = ".$idInmueble.";";
      } else {
        $query1 = "select count(*) as res from catastro.destinatarios_tasa where pjuridica = ".$idPersona." and inmueble = ".$idInmueble.";";
      }
      $statement = $this->cdb->prepare($query1);
      $statement->execute();
      $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
      if ($rows[0]->res == 1) {
        return true;
      }
      else { return false;
      }
    }
    /*Obtiene nombre de Destinatario por id de registro de tabla destinatarios_tasa */
    public function obtieneNombrePorDest($idDestinatario){
        $query = "select * from catastro.destinatarios_tasa where id = ".$idDestinatario.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        if ($rows[0]->pfisica == null){
          return $this->obtieneNombreConTipo($rows[0]->pjuridica,'J');
        }
        else {
          return $this->obtieneNombreConTipo($rows[0]->pfisica,'F');
        }
    }

    public function listarInmuebles(){
        $query = "SELECT id, nomencla FROM catastro.inmuebles;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    /**
 * Creamos un nuevo registro
 * @param type $tipo
 * @param type $inmueble
 * @param type $persona
 * @param type $porcentaje
 * @param type $f_alta
 * @param type $f_baja
 */
    function asignaDestinatario($tipo,$inmueble,$persona,$domicilio){
      if ($this->existeDestinatario($tipo,$inmueble,$persona)){
        echo "LA PERSONA YA TIENE LA TASA ASIGNADA SOBRE EL INMUEBLE SELECCIONADO";
        exit();
      }
      if ($tipo == 'F') {
        $sqlInsert = "INSERT INTO catastro.destinatarios_tasa(inmueble,pfisica,domicilio)"
             ." VALUES (".$inmueble.", ".$persona.", '".$domicilio."')";
        try {
          $this->cdb->exec($sqlInsert);
        } catch (PDOException $pdoException) {
          echo 'Error en asignaDestinatario en pfisica(...): '.$pdoException->getMessage();
          exit();
        }
      }
      else {
        $sqlInsert = "INSERT INTO catastro.destinatarios_tasa(inmueble,pjuridica,domicilio)"
               ." VALUES (".$inmueble.", ".$persona.", '".$domicilio."')";
        try {
          $this->cdb->exec($sqlInsert);
        } catch (PDOException $pdoException) {
          echo 'Error en asignaDestinatario en pjuridica(...): '.$pdoException->getMessage();
          exit();
        }
      }
    }


 /**
 * Actualizamos los valores.
 * @param type $tipo
 * @param type $id
 * @param type $inmueble
 * @param type $persona
 * @param type $porcentaje
 * @param type $f_alta
 * @param type $f_baja
 */
   public function update($tipo,$id,$persona,$domicilio){
     if ($tipo == 'F') {
       $sqlUpdate = "UPDATE catastro.destinatarios_tasa SET pfisica = ".$persona.", domicilio = '".$domicilio."' where id = ".$id.";";
     }
     else {
       $sqlUpdate = "UPDATE catastro.destinatarios_tasa SET pjuridica = ".$persona.", domicilio = '".$domicilio."' where id = ".$id.";";
     }
       try {
         $this->cdb->exec($sqlUpdate);
       } catch (PDOException $pdoException) {
         echo $sqlUpdate;
         echo 'Error actualizar un nuevo registro (...): '.$pdoException->getMessage();
         exit();
       }
  }

/**
 * Eliminamos registro.
 * @param type $id
 */
   public function delete($id){
    $sqlDelete =
        "DELETE FROM catastro.destinatarios_tasa WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un registro (...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
