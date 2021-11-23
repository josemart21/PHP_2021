<?php

require_once 'utils/utils.php';
require_once 'exceptions/FileException.php';
require_once 'exceptions/AppException.php';
require_once 'exceptions/QueryException.php';
require_once 'utils/File.php';
require_once 'entity/ImagenGaleria.php';
require_once 'repository/ImagenGaleriaRepository.php';
require_once 'entity/Categoria.php';
require_once 'repository/CategoriaRepository.php';
require_once 'database/Connection.php';
require_once 'database/QueryBuilder.php';
require_once 'core/App.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {
    $config = require_once 'app/config.php';

    App::bind('config', $config);

    $imgRepository = new ImagenGaleriaRepository();
    $categoriaRepository = new CategoriaRepository();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
            if(empty($categoria)){
                throw new ValidationException('No Se Ha Recibido La Categoría');
            }
        $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        $connection = Connection::make();

        $imagenGaleria = new ImagenGaleria ($imagen->getFileName(), $descripcion, $categoria);

        $imgRepository->guarda($imagenGaleria);

            $descripcion = '';
            $mensaje = 'Se Ha Guardado La Imágen';
        }

    $imagenes = $imgRepository->findAll();
    $categorias = $categoriaRepository->findAll();

}
catch(FileException $fileException){
    $errores[] = $fileException->getMessage();
}
catch (QueryException $queryException){
    $errores[] = $queryException->getMessage();
}
catch(AppException $appException) {
    $errores[] = $appException->getMessage();
}
catch(ValidationException $validationException) {
    $errores[] = $validationException->getMessage();
}

require 'views/galeria.view.php';

