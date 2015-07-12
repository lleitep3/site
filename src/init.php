<?php
use Symfony\Component\Yaml\Yaml;


$app['config'] = Yaml::parse(file_get_contents(CONFIG_PATH . '/config.yaml'));

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
   'db.options' => $app['config']['connection']
]);

// initialize Twig
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => realpath($app['ROOT_PATH'] . '/../app/templates'),
]);