<?php

namespace Jhonattan\PizzariaDelivery\Core\Router;

use Doctrine\ORM\Tools\Setup;

class EntityManager
{
    public static function getEntityManager()
    {
        $entityPaths = [__DIR__ . '/../src/Domain/Entities'];

        $isDevMode = true;

        $dbParams = [
            'dbname' => 'seu_banco_de_dados',
            'user' => 'seu_usuario',
            'password' => 'sua_senha',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        $config = Setup::createAnnotationMetadataConfiguration($entityPaths, $isDevMode);

        return em::create($dbParams, $config);
    }
}