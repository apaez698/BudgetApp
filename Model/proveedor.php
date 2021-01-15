<?php
class proveedor
{
	//Atributo para conexión a SGBD
	private $conection;

		//Atributos del objeto proveedor
    public $idProveedor;
    public $razonS;
    public $dir;
    public $tel;

	//Método de conexión a SGBD.
	public function __CONSTRUCT()
	{
		try
		{
			
			$this->conection =  Database::Conectar();
			

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método selecciona todas las tuplas de la tabla
	//proveedor en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$resultItems = array();
			//Sentencia SQL para selección de datos.
			$sql = "select * from proveedor";
			echo $sql;
			$result = $this->conection->query($sql);
			
			while ($actor = $result->fetch_assoc()) {
				$resultItems[] = $actor;
			}
			//print_r($resultItems);
			return $resultItems;
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	//Este método obtiene los datos del proveedor a partir del idProveedor
	//utilizando SQL.
	public function Obtener($idProveedor)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el idProveedor del proveedor.
			$sql = "SELECT * FROM proveedor WHERE idProveedor = '$idProveedor'";
			echo $sql;
			$result = $this->conection->query($sql);
			//Ejecución de la sentencia SQL utilizando el parámetro idProveedor.
			$row = $result->fetch_assoc();
			return $row;
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla proveedor dado un idProveedor.
	public function Eliminar($idProveedor)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$sql = "DELETE FROM proveedor WHERE idProveedor = '$idProveedor'";
			echo $sql;
			if($this->conection->query($sql) === TRUE) {
				echo "<p>Successfully removed!!</p>";
				return true;

				
			} else {
				echo "Error updating record : " . $this->conection->error;
				return false;
			}
			
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el idProveedor del proveedor.
	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			//print_r($data); die();
			$sql = "UPDATE proveedor SET
						razonS          = '".$data->razonS."',
						dir        = '".$data->dir."',
            tel        = '".$data->tel."'
					WHERE idProveedor = '".$data->idProveedor."'";
			//echo $sql;
			//Ejecución de la sentencia a partir de un arreglo.
			$this->conection->query($sql);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo proveedor a la tabla.
	public function Registrar(proveedor $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO proveedor (idProveedor,razonS,dir,tel)
				VALUES ('$data->idProveedor', '$data->razonS', '$data->dir', '$data->tel')";
			echo $sql; //die();

			$this->conection->query($sql);
		    
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
