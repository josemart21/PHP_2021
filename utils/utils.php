<?php

function esOpcionMenuActiva($opcionMenu)
{

    if(strpos($_SERVER['REQUEST_URI'], $opcionMenu) !== false){


        return true;


    }else{

        return false;

    }

}


function existeOpcionMenuActivaEnArray($opcionesMenu){


    foreach($opcionesMenu as $opcionsMenu){

        if(esOpcionMenuActiva($opcionsMenu) === true){

            return true;

        }else{

            return false;

        }

    }

}

?>