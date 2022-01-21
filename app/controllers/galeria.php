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

    $imgRepository = new ImagenGaleriaRepository();
    $categoriaRepository = new CategoriaRepository();


    $imagenes = $imgRepository->findAll();
    $categorias = $categoriaRepository->findAll();

}
catch (QueryException $queryException){
    $errores[] = $queryException->getMessage();
}
catch(AppException $appException) {
    $errores[] = $appException->getMessage();
}


require __DIR__ . '/../views/galeria.view.php';

