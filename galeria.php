<?php

require_once 'utils/utils.php';
require_once 'exceptions/FileException.php';
require_once 'utils/File.php';
require_once 'entity/ImagenGaleria.php';
require_once 'database/Connection.php';
require_once 'database/QueryBuilder.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {

    $connection = Connection::make();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        $connection = Connection::make();

        $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";

        $pdoStatement = $connection->prepare($sql);

        $parameters = [':nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];

        if ($pdoStatement->execute($parameters) === false) {

            $errores[] = "No Se Ha Podido Guardar La Imágen En La Base De Datos";

        } else {

            $descripcion = '';
            $mensaje = 'Se Ha Guardado La Imágen';
        }

    }

    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll('imagenes', 'ImagenGaleria');

}
catch(FileException $fileException){
    $errores[] = $fileException->getMessage();
}
catch (QueryException $queryException){
    $errores[] = $queryException->getMessage();
}

require 'views/galeria.view.php';

