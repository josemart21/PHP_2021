<?php
require_once __DIR__ . '/../database/IEntity.php';
class ImagenGaleria implements IEntity
{

    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    private $id;
    private string $nombre;
    private string $descripcion;
    private int $numVisualizaciones;
    private int $numLikes;
    private int $numDownloads;
    private int $categoria;

    /**
     * @param string $nombre
     * @param string $descripcion
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct(string $nombre = "",string $descripcion = "",int $categoria=1,int $numVisualizaciones = 0,int $numLikes = 0,int $numDownloads = 0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
        $this->categoria = $categoria;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDescripcion();
    }

    /**
     * @return string
     */

    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return ImagenGaleria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return ImagenGaleria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getNumVisualizaciones():int
    {
        return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     * @return ImagenGaleria
     */
    public function setNumVisualizaciones($numVisualizaciones)
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumLikes()
    {
        return $this->numLikes;
    }

    /**
     * @param int $numLikes
     * @return ImagenGaleria
     */
    public function setNumLikes($numLikes)
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumDownloads()
    {
        return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     * @return ImagenGaleria
     */
    public function setNumDownloads($numDownloads)
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoria(): int
    {
        return $this->categoria;
    }

    /**
     * @param int $categoria
     * @return ImagenGaleria
     */
    public function setCategoria(int $categoria): ImagenGaleria
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * @return string
     */



    public function getUrlProtfolio()
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    public function getUrlGallery()
    {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads(),
            'categoria' => $this->getCategoria()
            ];
    }



}