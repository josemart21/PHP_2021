<?php
require_once 'App.php';
require_once 'Request.php';
require_once 'Router.php';
require_once __DIR__ . '/../exceptions/NotFoundException.php';
require_once __DIR__ . '/../utils/MyLog.php';
require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind("config",$config);

$router = Router::load('app/routes.php');
App::bind('router',$router);

$logger = MyLog::load('logs/curso.log');
App::bind('logger',$logger);
