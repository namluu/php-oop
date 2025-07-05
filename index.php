<?php
require('config.php');
/** Autoloader */
spl_autoload_register(function ($class) {
    $root = __DIR__;
    $file = $root . '/' . str_replace('\\','/', lcfirst($class)) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

/** Error and Exception handling */
error_reporting(E_ALL);
set_exception_handler('Core\Error::exceptionHandler');

/** Routing */
$router = new Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('post', ['controller' => 'Post', 'action' => 'index']);
$router->add('post/create', ['controller' => 'Post', 'action' => 'create']);
$router->add('{controller}');
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$adminCustomLink = 'backend8090';
$router->add($adminCustomLink . '/{controller}', ['namespace' => 'Admin']);
$router->add($adminCustomLink . '/{controller}/{action}', ['namespace' => 'Admin']);
$router->add($adminCustomLink . '/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);

$uri = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($uri);
