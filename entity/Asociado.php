<?php

class Asociado
{

    const RUTA_IMAGENES_ASOCIADOS = 'images/index/asociados/';

    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $logo;
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @param string $nombre
     * @param string $logo
     * @param string $descripcion
     */
    public function __construct(string $nombre, string $logo, string $descripcion)
    {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
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
     * @return Asociado
     */
    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Asociado
     */
    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Asociado
     */
    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getUrlAsociados()
    {
        return self::RUTA_IMAGENES_ASOCIADOS . $this->getLogo();
    }




}