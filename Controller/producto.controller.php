<?php
require_once 'model/producto.php';
require_once 'model/proveedor.php';

class ProductoController{

    private $model;
    private $modelProveedor;

    public function __CONSTRUCT(){
        $this->model = new producto();
        $this->modelProveedor = new proveedor();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/producto/producto.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $prod = new producto();
        $proveedores = array();
        

        if(isset($_REQUEST['idProducto'])){
            $prod = $this->model->Obtener($_REQUEST['idProducto']);
            $proveedores = $this->modelProveedor->Listar();
        }

        require_once 'view/header.php';
        require_once 'view/producto/producto-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $prod = new producto();
        $proveedores = array();
        $proveedores = $this->modelProveedor->Listar();

        require_once 'view/header.php';
        require_once 'view/producto/producto-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $prod = new producto();

        $prod->idProducto = $_REQUEST['idProducto'];
        $prod->idProveedor = $_REQUEST['idProveedor'];
        $prod->nomprod = $_REQUEST['nomprod'];
        $prod->precioU = $_REQUEST['precioU'];
        $prod->descrip = $_REQUEST['descrip'];

        $this->model->Registrar($prod);

        header('Location: index.php?c=producto');
    }

    public function Editar(){
        $prod = new producto();

        $prod->idProducto = $_REQUEST['idProducto'];
        $prod->idProveedor = $_REQUEST['idProveedor'];
        $prod->nomprod = $_REQUEST['nomprod'];
        $prod->precioU = $_REQUEST['precioU'];
        $prod->descrip = $_REQUEST['descrip'];
       

        //die();


        $this->model->Actualizar($prod);

        header('Location: index.php?c=producto');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idProducto']);
        header('Location: index.php');
    }
}
