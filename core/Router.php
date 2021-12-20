<?php

class Router
{
    private $routes;

    /**
     * Router Constructor.
     */
    private function __construct()
    {
        $this->routes = [];
    }

    /**
     * @param string $file
     * @return Router
     */

    public static function load(string $file):Router
    {

        $router = new Router();

        require $file;

        return $router;
        
    }

    /**
     * @param array $routes
     */

    public function define(array $routes):void
    {
        $this->routes = $routes;
    }

    /**
     * @param string $uri
     * @return string
     * @throws NotFoundException
     */

    public function direct(string $uri):string
    {
        if(array_key_exists($uri, $this->routes))

            return $this->routes[$uri];

        throw new NotFoundException('No se ha definido una ruta para la uri solicitada');


    }

}