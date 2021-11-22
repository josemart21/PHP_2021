<?php

require_once __DIR__ . '/../database/IEntity.php';

class Categoria implements IEntity
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var int
     */

    private $numImagenes;

    /**
     * Categoria constructor
     * @param string $nombre
     * @param int $numImagenes
     */
    public function __construct(string $nombre, int $numImagenes)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumImagenes(): int
    {
        return $this->numImagenes;
    }

    /**
     * @param int $numImagenes
     * @return Categoria
     */
    public function setNumImagenes(int $numImagenes): Categoria
    {
        $this->numImagenes = $numImagenes;
        return $this;
    }


    public function toArray(): array
    {
        return [

            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImaganes()

        ];
    }
}