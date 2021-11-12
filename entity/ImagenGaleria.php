<?php

class ImagenGaleria
{

    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var int
     */
    private $numVisualizaciones;

    /**
     * @var int
     */
    private $numLikes;

    /**
     * @var int
     */
    private $numDownloads;

    /**
     * @param string $nombre
     * @param string $descripcion
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct($nombre="", $descripcion="", $numVisualizaciones=0, $numLikes=0, $numDownloads=0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
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

    /**
     * @return string
     */
    public function getDescripcion()
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

    /**
     * @return int
     */
    public function getNumVisualizaciones()
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





}