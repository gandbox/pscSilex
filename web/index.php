<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Debug\ErrorHandler;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;

require_once __DIR__.'/../vendor/autoload.php';

// set the error handling
ini_set('display_errors', 1);
error_reporting(-1);
ErrorHandler::register();
if ('cli' !== php_sapi_name()) {
  ExceptionHandler::register();
}

$app = new Silex\Application();

require __DIR__.'/../src/app.php';
require __DIR__.'/../src/controllers.php';

$app['debug'] = true;

//Request::setTrustedProxies(array('127.0.0.1', '::1'));
$app['http_cache']->run();
