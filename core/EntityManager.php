<?php

namespace Jhonattan\PizzariaDelivery\Core;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager as EntityManagerOrm;
use Doctrine\ORM\ORMSetup;
class EntityManager
{
    private static function config() :Configuration
    {
        return ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/../src/Domain/Entities'],
            isDevMode: $_ENV['APP_DEBUG'],
        );
    }
    private static function connection(Configuration $config): \Doctrine\DBAL\Connection
    {
        return DriverManager::getConnection([
            'dbname' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => $_ENV['DB_CONNECTION'],
        ], $config);
    }
    public static function getEntityManager(): EntityManagerOrm
    {
        $config = self::config();
        return new EntityManagerOrm(self::connection($config), $config);

    }
}
