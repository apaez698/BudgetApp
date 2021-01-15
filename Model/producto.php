<?php
class producto
{
	private $conection;

    public $idProducto;
    public $idProveedor;
    public $nomprod;
    public $precioU;
    public $descrip;

	public function __CONSTRUCT()
	{
		try
		{
			$this->conection = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$result = $this->conection->query("SELECT * FROM producto");
			while ($actor = $result->fetch_assoc()) {
				$resultItems[] = $actor;
			}
			//print_r($resultItems);
			return $resultItems;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idProducto)
	{
		try
		{
			$sql = "SELECT * FROM producto WHERE idProducto = '$idProducto'";
			echo $sql;
			$result = $this->conection->query($sql);
			//Ejecución de la sentencia SQL utilizando el parámetro idProducto.
			$row = $result->fetch_assoc();
			return $row;
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProducto)
	{
		try
		{
			

			$sql = "DELETE FROM producto WHERE idProducto = '$idProducto'";
			echo $sql;
			if($this->conection->query($sql) === TRUE) {
				echo "<p>Successfully removed!!</p>";
				return true;

				
			} else {
				echo "Error deleting record : " . $this->conection->error;
				return false;
			}

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE producto SET
						nomprod          = '$data->nomprod',
						precioU        = $data->precioU,
            descrip        = '$data->descrip'
					WHERE idProducto = '$data->idProducto'";
			$this->conection->query($sql);

			
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(producto $data)
	{
		try
		{
		$sql = "INSERT INTO producto (idProducto,idProveedor,nomprod,precioU,descrip)
		        VALUES ('$data->idProducto', '$data->idProveedor', '$data->nomprod', $data->precioU,'$data->descrip')";

		echo $sql; //die();

		$this->conection->query($sql);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
