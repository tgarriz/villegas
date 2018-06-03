<?php
require_once("../database/Database.php");
require_once("../interfaces/IProductor.php");

class Productor implements Productor
{
    private $con;
    private $codigo;
    private $nombre;
    private $id;
    public function __construct(Database $db)
	{
		$this->con = new $db;
	}
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

   //insertamos usuarios en una tabla con postgreSql
   public function save()
   {
 	 try{
    $query = $this->con->prepare('INSERT INTO productor (codigo, nombre) values (?,?)');
    $query->bindParam(1, $this->codigo, PDO::PARAM_STR);
		$query->bindParam(2, $this->nombre, PDO::PARAM_STR);
		$query->execute();
		$this->con->close();
	 }
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
        }
   }

   public function update()
   {
	 try{
		$query = $this->con->prepare('UPDATE productor SET codigo = ?, nombre = ? WHERE id = ?');
		$query->bindParam(1, $this->codigo, PDO::PARAM_STR);
		$query->bindParam(2, $this->nombre, PDO::PARAM_STR);
    $query->bindParam(3, $this->id, PDO::PARAM_INT);
		$query->execute();
		$this->con->close();
	  }
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
        }
   }

   //obtenemos usuarios de una tabla con postgreSql
   public function get()
   {
	  try{
            if(is_int($this->id))
            {
                $query = $this->con->prepare('SELECT * FROM productor WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
		            $this->con->close();
    		        return $query->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                $query = $this->con->prepare('SELECT * FROM productor');
    		        $query->execute();
    		        $this->con->close();
    		        return $query->fetchAll(PDO::FETCH_OBJ);
            }
	}
        catch(PDOException $e)
        {
		echo  $e->getMessage();
	}
   }

    public function delete()
    {
        try{
            $query = $this->con->prepare('DELETE FROM productor WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e)
        {
            echo  $e->getMessage();
        }
    }

    public static function baseurl()
    {
         return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/php/crudpgsql/";
    }

    public function checkProductor($productor)
    {
        if( ! $productor )
        {
            header("Location:" . Productor::baseurl() . "app/list.php");
        }
    }
}
