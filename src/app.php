<?php

use Silex\Provider;
use Repository\YAMLRepository;
use LessProvider\LessProvider;

// Register the Twig service provider
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/templates',
));

// Register the HTTP Cache provider
$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__.'/../cache/',
));

// Load YAML content (menu), and share the service with Pimple
$app['YAMLMenuFile'] = __DIR__.'/../ressources/menu.yaml';
$app['YAMLRepository'] = $app->share(function ($app) {
    return new YAMLRepository($app['YAMLMenuFile']);
});

$app->register(new Provider\ServiceControllerServiceProvider());
$app->register(new Provider\UrlGeneratorServiceProvider());

$app->register(new Provider\WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
    'profiler.mount_prefix' => '/_profiler', // this is the default
));

return $app;
