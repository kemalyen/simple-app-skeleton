<?php

declare(strict_types = 1);

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use function DI\autowire;
use function DI\create;
use function DI\get;
use function DI\factory;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Teuton\Simple\Services\SearchArticles;
use Teuton\Simple\Interfaces\SearchArticlesInterface;

return [
    SearchArticlesInterface::class => get(SearchArticles::class),
    
    EntityManager::class => factory([EntityManager::class, 'create'])
    ->parameter('connection', get('db.params'))
    ->parameter('config', get('doctrine.config')),
    
    'db.params' => [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => '$navMin2007',
        'dbname'   => 'simple',
        'types'    => [
            'emailAddress'      => Teuton\Simple\Model\DBAL\EmailAddressType::class,
            'passwordHash'      => Teuton\Simple\Model\DBAL\PasswordHashType::class,
            'role'              => Teuton\Simple\Model\DBAL\RoleType::class,
            'uuid'              => \Ramsey\Uuid\Doctrine\UuidType::class,
            'uuid_binary'       => \Ramsey\Uuid\Doctrine\UuidBinaryType::class,
        ]
    ],
    'doctrine.mapping.paths' => ['config/doctrine'],

    'doctrine.config' => DI\factory([Setup::class, 'createXMLMetadataConfiguration'])
    ->parameter('paths', DI\get('doctrine.mapping.paths'))
    ->parameter('isDevMode', ($_ENV['ENVIRONMENT'] === 'development')),
    
    LoggerInterface::class => DI\create(Logger::class)->constructor('demo'),
    
    // Configure Twig
    Environment::class => function () {
        $loader = new FilesystemLoader('templates');
        return new Environment($loader, ['debug' => true, 'cache' => 'storage/cache/templates/']);
    },
];



// obtaining the entity manager
