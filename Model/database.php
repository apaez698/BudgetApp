<?php
class Database
{
    //Esta función permite la conexión al SGBD: MariaDB.
    //host = tipo de conexión local - 'localhost'.
    //dbname = nombre de la base de datos.
    //charset = utf8, indica la codificación de caracteres utilizada.
    //root = nombre de usuario (solo para fines académicos=root).
    //'' = contraseña del root (solo para fines académicos).

    public static function Conectar()
    {


        $mysqli = new mysqli('localhost', 'root', 'root', 'mvc_php');
        // ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
        if ($mysqli->connect_errno) {
            // La conexión falló. ¿Que vamos a hacer? 
            // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
            // No se debe revelar información delicada

            // Probemos esto:
            echo "Lo sentimos, este sitio web está experimentando problemas.";

            // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
            // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
            echo "Error: Fallo al conectarse a MySQL debido a: \n";
            echo "Error: " . $mysqli->connect_errno . "\n";
            echo "Error: " . $mysqli->connect_error . "\n";
            return null;

            // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
           // exit;
        } else {
            return $mysqli;
        }
    }
}
