<?php

require_once __DIR__ . '/../database/IEntity.php';

class Asociado implements IEntity
{

    const RUTA_IMAGENES_ASOCIADOS = 'images/index/asociados/';

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
    //public function __construct(string $nombre, string $logo, string $descripcion)
    public function __construct(string $nombre='', string $logo='', string $descripcion='')
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */

    public function getId() : int
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

    public function toArray() : array
    {
        return[
            'id' => $this->id,
            'nombre' => $this->nombre,
            'logo' => $this->logo,
            'descripcion' => $this->descripcion
        ];
    }


}