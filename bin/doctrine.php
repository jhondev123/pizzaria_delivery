<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . '/../vendor/autoload.php';

\Jhonattan\PizzariaDelivery\Core\Bootstrap::initEnvironment();
$entityManager = \Jhonattan\PizzariaDelivery\Core\EntityManager::getEntityManager();

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);