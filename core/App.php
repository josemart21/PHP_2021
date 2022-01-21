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
     * @param $value
     * @throws AppException
     */

    public static function bind(string $key, $value)
    {
        static::$container[$key] = $value;
    }

    /**
     * @param string $key
     * @throws AppException
     */

    public static function get(string $key)
    {

        if (!array_key_exists($key, static::$container))

            throw new AppException("No Se Ha Encontrado La Clave $key En El Contenedor");

            return static::$container[$key];


    }

    /**
     * @return mixed
     * @throws AppException
     */

    public static function getConnection()
    {
        if (!array_key_exists('connection', static::$container))
            static::$container['connection'] = Connection::make();
            return static::$container['connection'];


    }

}