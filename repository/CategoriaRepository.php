<?php

require_once __DIR__ . '/../database/QueryBuilder.php';

class CategoriaRepository extends QueryBuilder
{

    /**
     * ImagenGaleriaRepository constructor.
     */

    public function __construct(string $table = 'categorias', string $classEntity = 'Categoria')
    {

        parent::__construct($table, $classEntity);

    }

    /**
     * @param Categoria $categoria
     */

    public function nuevaImagen(Categoria $categoria)
    {
        $categoria->setNumImagenes($categoria->getNumImagenes()+1);
        $this->update($categoria);
    }

}