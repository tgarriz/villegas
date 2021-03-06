<?php


class CbPropietarioController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.propietarios;";
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

    public function obtieneTipoPorProp($idPropietario){
      $query1 = "select * from catastro.propietarios where id = ".$idPropietario.";";
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
    /*Devuelve true si el propietario ya existe sobre el inmueble seleccionado*/
    public function existePropietario($tipo,$idInmueble,$idPersona){
      if ($tipo == 'F') {
        $query1 = "select count(*) as res from catastro.propietarios where pfisica = ".$idPersona." and inmueble = ".$idInmueble.";";
      } else {
        $query1 = "select count(*) as res from catastro.propietarios where pjuridica = ".$idPersona." and inmueble = ".$idInmueble.";";
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
    /*Obtiene nombre de propietario por id de registro de tabla propietarios */
    public function obtieneNombrePorProp($idPropietario){
        $query = "select * from catastro.propietarios where id = ".$idPropietario.";";
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
    function asignaPropietario($tipo,$inmueble,$persona,$porcentaje,$f_alta,$f_baja){
      if ($this->existePropietario($tipo,$inmueble,$persona)){
        echo "LA PERSONA YA ES PROPIETARIO SOBRE EL INMUEBLE SELECCIONADO";
        exit();
      }
      if ($f_baja =='') {$f_baja = '1900-01-01';}
      if ($tipo == 'F') {
        $sqlInsert = "INSERT INTO catastro.propietarios(inmueble,pfisica,porcentaje,f_alta,f_baja)"
             . " VALUES (".$inmueble.", ".$persona.", ".$porcentaje.", '".$f_alta."'::date, '".$f_baja."'::date)";
        try {
          $this->cdb->exec($sqlInsert);
        } catch (PDOException $pdoException) {
          echo 'Error en asignaPropietario en pfisica(...): '.$pdoException->getMessage();
          exit();
        }
      }
      else {
        $sqlInsert = "INSERT INTO catastro.propietarios(inmueble,pjuridica,porcentaje,f_alta,f_baja)"
               . " VALUES (".$inmueble.", ".$persona.", ".$porcentaje.", '".$f_alta."'::date, '".$f_baja."'::date)";
        try {
          $this->cdb->exec($sqlInsert);
        } catch (PDOException $pdoException) {
          echo 'Error en asignaPropietario en pjuridica(...): '.$pdoException->getMessage();
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
   public function update($id,$inmueble,$porcentaje,$f_alta,$f_baja){
       $sqlUpdate = "UPDATE catastro.propietarios SET inmueble = ".$inmueble.", porcentaje = ".$porcentaje.", f_alta = '".$f_alta."'::date, f_baja = '".$f_baja."'::date WHERE id = ".$id.";";
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
        "DELETE FROM catastro.propietarios WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un registro (...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
