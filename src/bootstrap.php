<?php

use Symfony\Component\Yaml\Yaml;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

define('ROOT_PATH', realpath(__DIR__));
define('CONFIG_PATH', realpath(__DIR__ . '/../app/config'));

$app['ROOT_PATH'] = ROOT_PATH;

$app['env'] = isset($_ENV['env'])? $_ENV['env'] : 'dev';
$app['debug'] = true;
// initialize avaliable routes of modules
require_once realpath(__DIR__) . '/init.php';
require_once realpath(__DIR__) . '/routes.php';


try {

    if ('test' == $app['env']) {
        return $app;
    }

    $app->run();

} catch (\Exception $e) {
    echo $e->getMessage();
}