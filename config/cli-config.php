<?php

declare(strict_types = 1);

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(getcwd());
$dotenv->load();

$container = require_once 'config/container.php';
$entityManager = $container->get(EntityManager::class);

foreach($container->get('db.params')['types'] as $name => $classname) {
    \Doctrine\DBAL\Types\Type::addType($name, $classname);
}

return ConsoleRunner::createHelperSet($entityManager);