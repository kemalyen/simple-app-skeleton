<?php declare(strict_types = 1);

error_reporting(E_ALL);
@ini_set('display_errors', '1');
@ini_set('display_startup_errors', '1');

/**
 * Routes
 *
 * @desc     Route Definitions
 * @category Class
 * @package  Teuton\Simple
 * @license  CC-BY-NC-ND-4.0
 * @author   Erik Pöhler <info@teuton.mx>
 * @link     https://www.teuton.mx/
 */

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(getcwd());
$dotenv->load();

$whoops = false;
if ($_ENV['ENVIRONMENT'] !== 'production') {
    $whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
}

/** @var DI\Container $container */
$container = require 'config/container.php';

$dispatcher = FastRoute\cachedDispatcher(function (FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/', \Teuton\Simple\Controller\IndexController::class);
        $r->addRoute(['GET','POST'], '/login', \Teuton\Simple\Controller\IndexController::class);
        $r->addRoute('GET', '/activate/{token:[A-Za-z0-9\-\.$=]+}', \Teuton\Simple\Controller\User\ActivationController::class);
        $r->addRoute('GET', '/', \Teuton\Simple\Controller\IndexController::class);
    },
    [
        'cacheFile' => 'storage/cache/routes.php',
        'cacheDisabled' => !($_ENV['ENVIRONMENT'] === 'production'),
    ]
);

// adding custom DBAL types
foreach($container->get('db.params')['types'] as $name => $classname) {
    \Doctrine\DBAL\Types\Type::addType($name, $classname);
}

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $container->call([\Teuton\Simple\Controllers\ErrorController::class, 'notFound'])->send();
        break;
        
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $container->call([\Teuton\Simple\Controllers\ErrorController::class, 'methodNotAllowed'])->send();
        break;

    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = $route[2];
        try {
            $container->call($controller, $parameters)->send();
        } catch (\Exception $e) {
            if ($whoops) {
                $whoops->handleException($e);
            }
            $container->call([\Teuton\Simple\Controllers\ErrorController::class, 'exception'])->send();
        }
        break;
}