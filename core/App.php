<?php

require_once __DIR__ . '/../exceptions/AppException.php';

class App
{
    /**
     * @var array
     */

    private static $container = [];

    /**
     * @param string $key
     * @throws AppException
     */

    public static function bind(string $key){

        if(! array_key_exists($key, static::$connection)){

            throw new AppException("No Se Ha Encontrado La Clave $key En El Contenedor");

            return static::$container[$key];

        }
    }

    public static function getConnection()
    {

    }
}