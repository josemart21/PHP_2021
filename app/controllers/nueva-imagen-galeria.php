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


try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        if (empty($categoria)) {
            throw new ValidationException('No Se Ha Recibido La Categoría');
        }
        $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        $connection = Connection::make();

        $imagenGaleria = new ImagenGaleria ($imagen->getFileName(), $descripcion, $categoria);


    $imgRepository = new ImagenGaleriaRepository();
    $imgRepository->guarda($imagenGaleria);

    $message = "Se Ha Guardado Una Nueva Imagen: " . $imagenGaleria->getNombre();
    App::get('logger')->add($message);


} catch (FileException $fileException) {

    die($fileException->getMessage());

} catch (QueryException $queryException) {

    die($queryException->getMessage());

} catch (ValidationException $validationException) {

    die($validationException->getMessage());

}
catch (AppException $appException)
{

    die($appException->getMessage());

}

App::get('router')->redirect('imagenes-galeria');

