<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Añadir Bootstrap para mejorar nuestra interfaz -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom-style.css" />
    <title>Contap</title>
</head>

<body class="big-banner">
    <?php
    /*Esto sera migrado a la bdd en el siguiente entregable contando con un CRUD para ingresar presupuestos y 
    se espera moverlo a su propio fichero
    */
    $budgets = [
        "Comida" => "Comida",
        "Diversion" => "Diversion",
        "General" => "General"
    ];
    /*
    Variable que mantendra los registros (Ingresos/Egresos) durante la sesión se modificara por una tabla en la BDD
    */ 
    if (!isset($_SESSION['registros'])) {
        $_SESSION['registros'] = array();
    }
    /*  
    Variable que mantendra los presupuestos durante la sesión se modificara por una tabla en la BDD
    */ 
    if (!isset($_SESSION['presupuestos'])) {
        $_SESSION['presupuestos'] = $budgets;
    }
    /*En el caso de que el botón submit sea activado añadira el registro al arreglo*/
    if (isset($_POST['submit'])) {
        $montoTran = $_POST['montoTran'];
        $descTran = $_POST['descTran'];
        $tipoTran = $_POST['tipoTran'];
        if (!empty($budgets)) {
            $budgetSelected = $_POST['budgetSelect'];
        }
        $registro = array(
            "monto" => $montoTran,
            "descripcion" => $descTran,
            "tipo" => $tipoTran,
            "presupuesto" => $budgetSelected
        );
        array_push($_SESSION['registros'], $registro);
    }



    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <nav class="nav nav-pills flex-column flex-sm-row mb-5 bg-light">
        <a class="flex-sm-fill text-sm-center nav-link active" href="index.php">Ingresar Registro</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="registry.php">Visualizar Presupuestos</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" href="#">Historicos</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="logout.php">Cerrar Sesión</a>
    </nav>
    <div class="container">
    <div class="card">
        <div class="card-body">
                <form role="form" method="post">
                    <div class="form-group row">
                        <label for="montoTran" class="offset-sm-3 col-sm-2 col-form-label">Monto Transacción</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="montoTran" name="montoTran" placeholder="Ingrese el monto de la transacción" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descTran" class="offset-sm-3 col-sm-2 col-form-label">Descripción</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="descTran" name="descTran" placeholder="Ingrese el concepto de la transacción" required />
                        </div>
                    </div>
                    <div class="form-group row"> 
                    <label for="tipo" class="offset-sm-3 col-sm-2 col-form-label">Tipo Transacción</label>
                        <div class="col-sm-4">
                            <input type="radio" name="tipoTran" value="Ingreso" <?php if ($tipoTran == "Ingreso") {
                                                                                    echo "checked";
                                                                                } ?>> Ingreso
                            <input type="radio" name="tipoTran" value="Egreso" <?php if ($tipoTran == "Egreso") {
                                                                                    echo "checked";
                                                                                } ?>> Egreso
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="tipo" class="offset-sm-3 col-sm-2 col-form-label">Presupuesto:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="budgetSelect" name="budgetSelect">
                                <?php
                                if (isset($budgets)) {
                                    foreach ($budgets as $budget) {
                                        echo '<option value="' . $budget . '">' . $budget . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-6 col-sm-4">
                            <input type="submit" value="Registrar" name="submit" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>