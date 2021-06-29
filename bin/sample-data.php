<?php
declare(strict_types = 1);

use Doctrine\ORM\EntityManager;
use Teuton\Simple\Model\Article\Article;
use Teuton\Simple\Model\Generic\EmailAddress;
use Teuton\Simple\Model\Generic\PasswordHash;
use Teuton\Simple\Model\User\Role;
use Teuton\Simple\Model\User\User;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(getcwd());
$dotenv->load();

$container = require_once 'config/container.php';

foreach($container->get('db.params')['types'] as $name => $classname) {
    \Doctrine\DBAL\Types\Type::addType($name, $classname);
}

/* @var EntityManager $entityManager */
$entityManager = $container->get(EntityManager::class);

$entityManager->persist(new Article('Test', 'Lorem Ipsum dolor sit amet'));
$entityManager->persist(new Article('Hello world!', 'This article is here to welcome you.'));
$entityManager->persist(new Article('There is something new!', 'Here is a another article.'));

$entityManager->persist(new User(
    EmailAddress::fromString('info@teuton.mx'),
    PasswordHash::fromPassword('foobar'), 
    Role::fromString('admin'),
   'Erik', 
   'Pöhler'));

$entityManager->flush();