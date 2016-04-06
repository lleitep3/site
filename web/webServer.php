<?php
/**
 * To run PHP server just paste the code bellow in root path :
 * $ php -S 0.0.0.0:8080 -t ./web/ -f webServer.php
 **/
if (preg_match('/\.css|\.js|\.jpg|\.png|\.map$/', $_SERVER['REQUEST_URI'], $match)) {
    $mimeTypes = [
        '.css' => 'text/css',
        '.js'  => 'application/javascript',
        '.jpg' => 'image/jpg',
        '.png' => 'image/png',
        '.map' => 'application/json'
    ];
    $path = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($path)) {
        header("Content-Type: {$mimeTypes[$match[0]]}");
        require $path;
        exit;
    }
}
require_once __DIR__.'/../src/bootstrap.php';