<?php

require 'utils/utils.php';
require_once 'entity/Mensaje.php';
require_once 'repository/MensajeRepository.php';
require_once 'database/Connection.php';


$formulario = [

    [
        'nombre' => '',
        'apellido' => '',
        'correo' => '',
        'tema' => '',
        'mensaje' => '',
    ]
];

$errores = [];
$mensajeRecibido = '';

try {

    $mensajeRepository = new MensajeRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $tema = trim(htmlspecialchars($_POST['tema']));
        $correo = trim(htmlspecialchars($_POST['correo']));
        $texto = trim(htmlspecialchars($_POST['mensaje']));
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

            $formulario[] = ['nombre' => $nombre, 'apellido' => $apellido, 'correo' => $correo, 'tema' => $tema, 'mensaje' => $texto];

        }


        if (empty($errores)) {

            $mensajeRecibido = new Mensaje($nombre,$apellido,$tema,$correo,$texto);

            $mensajeRepository->save($mensajeRecibido);

            $mensajeRecibido = 'Hemos recibido tu mensaje';

            }
    }

}catch(FileException $fileException){
        $errores[] = $fileException->getMessage();
}catch(ValidationException $validationException){
        $errores[] = $validationException->getMessage();
}catch(QueryException $queryException){
    $errores[] = $queryException->getMessage();
}


require __DIR__ . '/../views/contact.view.php';





?>
