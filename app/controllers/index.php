<?php

require_once 'entity/ImagenGaleria.php';
require_once 'entity/Asociado.php';
require_once 'utils/utils.php';
require_once 'database/QueryBuilder.php';
require_once 'repository/ImagenGaleriaRepository.php';
require_once 'database/Connection.php';
require_once 'repository/AsociadoRepository.php';

$imgRepository = new ImagenGaleriaRepository();
$imagenes = $imgRepository->findAll();

$imagenCat1 = getImgCat(1, $imagenes);
$imagenCat2 = getImgCat(2, $imagenes);
$imagenCat3 = getImgCat(3, $imagenes);

function getImgCat(int $categoria, array $imagenes): array
{

    $catgen = [];

    foreach ($imagenes as $imagen) {
        if ($imagen->getCategoria() == $categoria) {
            array_push($catgen, $imagen);
        }
    }

    return $catgen;

}

/*$imagenes = [

    new ImagenGaleria(
        '1.jpg',
        'Descripción Imagen 1',
        '42',
        '3',
        '30'
    ),
    new ImagenGaleria(
        '2.jpg',
        'Descripción Imagen 2',
        '30',
        '3',
        '12'
    ),
    new ImagenGaleria(
        '3.jpg',
        'Descripción Imagen 3',
        '55',
        '12',
        '10'
    ),
    new ImagenGaleria(
        '4.jpg',
        'Descripción Imagen 4',
        '19',
        '8',
        '5'
    ),
    new ImagenGaleria(
        '5.jpg',
        'Descripción Imagen 5',
        '67',
        '65',
        '50'
    ),
    new ImagenGaleria(
        '6.jpg',
        'Descripción Imagen 6',
        '10',
        '7',
        '1'
    ),
    new ImagenGaleria(
        '7.jpg',
        'Descripción Imagen 7',
        '89',
        '67',
        '60'
    ),
    new ImagenGaleria(
        '8.jpg',
        'Descripción Imagen 8',
        '65',
        '2',
        '32'
    ),
    new ImagenGaleria(
        '9.jpg',
        'Descripción Imagen 9',
        '35',
        '31',
        '6'
    ),
    new ImagenGaleria(
        '10.jpg',
        'Descripción Imagen 10',
        '88',
        '80',
        '39'
    ),
    new ImagenGaleria(
        '11.jpg',
        'Descripción Imagen 11',
        '11',
        '11',
        '2'
    ),
    new ImagenGaleria(
        '12.jpg',
        'Descripción Imagen 12',
        '12',
        '12',
        '1'
    ),
];
*/

/*$asociados = [
    new Asociado(
        'Primer Asociado',
        'log1.jpg',
        'Descripción Primer Asociado'
    ),
    new Asociado(
        'Segundo Asociado',
        'log2.jpg',
        'Descripción Segundo Asociado'
    ),
    new Asociado(
        'Tercer Asociado',
        'log3.jpg',
        'Descripción Tercer Asociado'
    ),
    new Asociado(
        'Cuarto Asociado',
        'log3.jpg',
        'Descripción Cuarto Asociado'
    ),
    new Asociado(
        'Quinto Asociado',
        'log1.jpg',
        'Descripción Quinto Asociado'
    ),
    new Asociado(
        'Sexto Asociado',
        'log2.jpg',
        'Descripción Sexto Asociado'
    ),
];
*/

$asociados = [];

/*array_push($asociados, new Asociado('Primer Asociado','log1.jpg','Descrip'));
*/
$asociadoRepository = new AsociadoRepository;


if (count($asociadoRepository->findAll()) > 0) {

    $asociados = $asociadoRepository->findAll();

    $asociados = obtenerArrayReducido($asociados, 3);

} else {

    array_push($asociados, new Asociado('Primer Asociado', 'log1.jpg', 'Descrip'));
    array_push($asociados, new Asociado('Segundo Asociado', 'log2.jpg', 'Descrip'));
    array_push($asociados, new Asociado('Tercer Asociado', 'log3.jpg', 'Descrip'));

}


require  __DIR__ . '/../views/index.view.php';



