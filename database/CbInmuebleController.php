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
class CbInmuebleController {
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre cb_language.
     * We return all the results of the query on cb_language.
     */
    public function readAll(){
        $query = "SELECT * FROM catastro.inmuebles;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }


    /**
 * Creamos un nuevo idioma con los parámetros pasados.
 * We create a new language with parameters .
 * @param type $circ
 * @param type $secc
 * @param type $chac_n
 * @param type $chac_l
 * @param type $quin_n
 * @param type $quin_l
 * @param type $frac_n
 * @param type $frac_l
 * @param type $manz_n
 * @param type $manz_l
 * @param type $parc_n
 * @param type $parc_l
 * @param type $subp
 * @param type $superficie
 * @param type $nro_puerta
 * @param type $p_municipal
 * @param type $domicilio
 * @param type $tipo
 * @param type $frente
 * @param type $uso
 * @param type $nomencla
 * @param type $nomencla_sp
 */
    function create($circ,$secc,$chac_n,$chac_l,$quin_n,$quin_l,$frac_n,$frac_l,$manz_n,$manz_l,$parc_n,$parc_l,$subp,$superficie,$nro_puerta,$p_municipal,$domicilio,$tipo,$uso,$frente,$nomencla,$nomencla_sp){
      $sqlInsert = "INSERT INTO catastro.inmuebles(circ,secc,chac_n,chac_l,quin_n,quin_l,frac_n,frac_l,manz_n,manz_l,parc_n,parc_l,subp,superficie,nro_puerta,p_municipal,domicilio,tipo,uso,frente,nomencla,nomencla_sp)"
             . "    VALUES ('".$circ."', '".$secc."', '".$chac_n."', '".$chac_l."', '".$quin_n."', '".$quin_l."','".$frac_n."', '".$frac_l."', '".$manz_n."', '".$manz_l."', '".$parc_n."', '".$parc_l."', '".$subp."', '".$superficie."','".$nro_puerta."','".$p_municipal."', '".$domicilio."', '".$tipo."', '".$uso."', '".$frente."', '".$nomencla."','".$nomencla_sp."' )";
      try {
        $this->cdb->exec($sqlInsert);
      } catch (PDOException $pdoException) {
        echo 'Error al crear un nuevo registro en create(...): '.$pdoException->getMessage();
        exit();
      }
    }

   /**
 * Actualizamos los valores.
 * @param type $circ
 * @param type $secc
 * @param type $chac_n
 * @param type $chac_l
 * @param type $quin_n
 * @param type $quin_l
 * @param type $frac_n
 * @param type $frac_l
 * @param type $manz_n
 * @param type $manz_l
 * @param type $parc_n
 * @param type $parc_l
 * @param type $subp
 * @param type $superficie
 * @param type $nro_puerta
 * @param type $p_municipal
 * @param type $domicilio
 * @param type $tipo
 * @param type $frente
 * @param type $uso
 * @param type $nomencla
 * @param type $nomencla_sp

 */
   public function update($id,$circ,$secc,$chac_n,$chac_l,$quin_n,$quin_l,$frac_n,$frac_l,$manz_n,$manz_l,$parc_n,$parc_l,$subp,$superficie,$nro_puerta,$p_municipal,$domicilio,$tipo,$uso,$frente,$nomencla,$nomencla_sp){
    $sqlUpdate = "UPDATE catastro.inmuebles SET circ = '".$circ."', secc = '".$secc."', chac_n = '".$chac_n."', quin_n = '".$quin_n."', quin_l = '".$quin_l."', frac_n = '".$frac_n."', frac_l = '".$frac_l."', manz_n = '".$manz_n."', manz_l = '".$manz_l."', parc_n = '".$parc_n."', parc_l = '".$parc_l."', subp = '".$subp."', superficie = '".$superficie."', nro_puerta = '".$nro_puerta."', p_municipal = '".$p_municipal."', domicilio = '".$domicilio."', tipo = '".$tipo."', frente = '".$frente."', uso = '".$uso."', nomencla = '".$nomencla."', nomencla_sp = '".$nomencla_sp."' WHERE  id  = ".$id.";";
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
        "DELETE FROM catastro.inmuebles WHERE id = ".$id.";";
    try {
        $this->cdb->exec($sqlDelete);
    } catch (Exception $exception) {
        echo ' - Error al eliminar un registro (...): '.$exception->getMessage();
        exit();
    }
   }
}
?>
