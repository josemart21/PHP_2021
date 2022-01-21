<?php

require_once 'utils/utils.php';
require_once 'exceptions/FileException.php';
require_once 'exceptions/ValidationException.php';
require_once 'utils/File.php';
require_once 'entity/Asociado.php';
require_once 'repository/AsociadoRepository.php';
require_once 'database/Connection.php';

$errores = [];

    try {

        $asociadoRepository = new AsociadoRepository();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = trim(htmlspecialchars($_POST['nombre']));
            if(empty($nombre)){


                throw new ValidationException('El Nombre No Puede Quedar Vacío');

            }

            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
            $imagenFile = new File('logo', $tiposAceptados);
            $imagenFile->saveUploadFile(Asociado::RUTA_IMAGENES_ASOCIADOS);
            $asociado = new Asociado($nombre,$imagenFile->getFileName(),$descripcion);

            $asociadoRepository->save($asociado);

            $mensaje = "Se ha guardado el asociado ". $asociado->getNombre();
            $descripcion = "";
            $nombre = "";
        }

        $asociados=$asociadoRepository->findAll();

    }catch(FileException $fileException){
        $errores[] = $fileException->getMessage();
    }
    catch(ValidationException $validationException){
        $errores[] = $validationException->getMessage();
    }
    catch(QueryException $queryException){
        $errores[] = $queryException->getMessage();
    }




require __DIR__ . '/../views/asociados.view.php';