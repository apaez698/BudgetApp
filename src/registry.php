<?php
//Reanuda la sesión basado en el identificador.
session_start();
function calcularPresupuesto($nombrePresupuesto, $registros)
{
    $totalPresupuesto = 0;
    foreach ($registros as $registro) {
        if ($registro['presupuesto'] == $nombrePresupuesto) {
            switch ($registro['tipo']) {
                case 'Ingreso':
                    $totalPresupuesto += (float)$registro['monto'];
                    break;
                case 'Egreso':
                    $totalPresupuesto = $totalPresupuesto - (float)$registro['monto'];
                    break;
                default:
                    break;
            }
        }
    }
    return $totalPresupuesto;
}
function calcularPorcentaje($nombrePresupuesto, $registros)
{
    $totalDisponible = 0;
    $totalOcupado = 0;
    foreach ($registros as $registro) {
        if ($registro['presupuesto'] == $nombrePresupuesto) {
            if (strcmp($registro['tipo'], 'Ingreso') == 0) {
                $totalDisponible += (float)$registro['monto'];
            }
            if (strcmp($registro['tipo'], 'Egreso') == 0) {
                $totalOcupado += (float)$registro['monto'];
            }
        }
    }
    if ($totalDisponible == 0) {
        return 0;
    } else if (($totalOcupado * 100) / $totalDisponible > 100) {
        return 0;
    } else {
        return (($totalOcupado * 100) / $totalDisponible);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Visualizar Presupuestos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <nav class="nav nav-pills flex-column flex-sm-row mb-5 bg-light">
        <a class="flex-sm-fill text-sm-center nav-link active" href="index.php">Ingresar Registro</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="registry.php">Visualizar Presupuestos</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" href="#">Historicos</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="logout.php">Cerrar Sesión</a>
    </nav>
    <div class="container">
        <?php
        if (isset($_SESSION['presupuestos'])) {
            foreach ($_SESSION['presupuestos'] as $presupuesto) {
                echo "<h2> $" . calcularPresupuesto($presupuesto, $_SESSION['registros']) . "</h2>";
                echo "<h2>" . $presupuesto . "</h2>";
                echo "<div class=\"progress\">";
                echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:" . calcularPorcentaje($presupuesto, $_SESSION['registros']) . "%\">";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>

</body>

</html>