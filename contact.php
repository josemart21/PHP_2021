<?php

require 'utils/utils.php';


$formulario = [

    [
        'nombre' => '',
        'apellido' => '',
        'correo' => '',
        'tema' => '',
        'mensaje' => ''
    ]
];

$errores = [];
$mensajeRecibido = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $apellido = trim(htmlspecialchars($_POST['apellido']));
    $correo = trim(htmlspecialchars($_POST['correo']));
    $tema = trim(htmlspecialchars($_POST['tema']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));
    $validacionOK = true;

    if (!empty($nombre) && !empty($correo) && !empty($tema)) {

        if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {

            $validacionOK = false;
            array_push($errores, "El correo electrónico no és correcto");

        }
    } else {

        $validacionOK = false;
        array_push($errores, "Error. Revise los campos vacíos");

    }


    if ($validacionOK === true) {

        $formulario[] = ['nombre' => $nombre, 'apellido' => $apellido, 'correo' => $correo, 'tema' => $tema, 'mensaje' => $mensaje];

    }


    if(empty($errores)){

        require_once 'database/Connection.php';

        $config = require_once 'app/config.php';
        $connection = Connection::make($config['database']);

        $sql = "INSERT INTO mensajes (nombre,apellido,correo,tema,mensaje) values ('$nombre','$apellido','$correo','$tema','$mensaje')";

        if($connection->exec($sql) === false){

            $errores[] = "No se ha podido guardar el mensaje en la base de datos";

        }else{

            $mensajeRecibido = 'Hemos recibido tu mensaje';

        }

    }



}


require 'views/contact.view.php';





?>
