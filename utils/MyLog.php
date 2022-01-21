<?php

class MyLog
{
    /**
     * @var Monolog\Logger
     */

    private $log;

    /**
     * @param string $filename
     * @throws Exception
     */

    private function __construct(string $filename){


        $this->log = new Monolog\Logger('name');
        $this->log->pushHandler(new Monolog\Handler\StreamHandler($filename, Monolog\Logger::INFO));

    }

    /**
     * @param string $filename
     * @return MyLog
     * @throws Exception
     */

    public static function load(string $filename):MyLog
    {
        return new MyLog($filename);
    }

    /**
     * @param string $message
     */

    public function add(string $message):void
    {
        $this->log->info($message);

    }

}