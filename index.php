<?php

try{

    require 'core/bootstrap.php';
    
    require Router::load('app/routes.php')->direct(Request::uri());

}catch(NotFoundException $notFoundException){

    die($notFoundException->getMessage());

}
