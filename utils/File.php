<?php

require_once __DIR__ . '/../exceptions/FileException.php';

class File
{
    private $file;
    private $fileName;

    /**
     * @param string $fileName
     * @param array $arrTypes
     * @throws FileException
     */

    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if(!isset($this->file)){

            throw new FileException('Debes Seleccionar Un Fichero');
        }

        if($this->file['error'] !== UPLOAD_ERR_OK){

            switch($this->file['error']){

                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:

                throw new FileException('El Fichero Es Demasiado Grande');

                case UPLOAD_ERR_PARTIAL:

                    throw new FileException('No Se Ha Podido Subir El Fichero Completo');

                default:

                    throw new FileException('No Se Ha Podido Subir El Fichero');

            }

        }

        if(in_array($this->file['type'], $arrTypes) === false){

            throw new FileException('Tipo De Fichero No Soportado');
        }

    }

    public function getFileName(){

        return $this->fileName;

    }

    /**
     * @param string $rutaDestino
     * @throws FileException
     */

    public function saveUploadFile(string $rutaDestino)
    {
        if(is_uploaded_file($this->file['tmp_name']) === false)

            throw new FileException('El Archivo No Ha Sido Subido Mediante Un Formulario');

            $this->fileName = $this->file['name'];
            $ruta = $rutaDestino . $this->fileName;

            if(is_file($ruta) === true){
                $idUnico = time();
                $this->fileName = $idUnico . '_' . $this->fileName;
                $ruta = $rutaDestino . $this->fileName;
            }

            if(move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
                throw new FileException('No Se Puede Mover El Fichero A Su Destino');
            }    
    }

    /**
     * @param string $rutaOrigen
     * @param string $rutaDestino
     * @throws FileException
     */

    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        if(copy($origen,$destino) === false){

            throw new FileException("No se ha podido copiar el fichero $origen a $destino");

        }

        if(is_file($origen) === false){

            throw new FileException("No Existe El Fichero $origen que estás intentando copiar");

        }
        if(is_file($destino) === false){

            throw new FileException("El Fichero $destino ya existe y no se puede sobreescribir");

        }

    }


}