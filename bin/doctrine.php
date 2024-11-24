<?php


use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Symfony\Component\Console\Application;

require_once __DIR__ . '/../vendor/autoload.php';

\Jhonattan\PizzariaDelivery\Core\Bootstrap::initEnvironment();
$entityManager = \Jhonattan\PizzariaDelivery\Core\EntityManager::getEntityManager();

$config = new PhpFile(__DIR__ . '/../migrations-config.php');
$dependencyFactory = DependencyFactory::fromEntityManager(
    $config,
    new ExistingEntityManager($entityManager)
);

// Criar a aplicação console
$application = new Application('Doctrine Command Line Interface');

// Registrar comandos do ORM
$entityManagerProvider = new SingleManagerProvider($entityManager);
ConsoleRunner::addCommands($application, $entityManagerProvider);

// Registrar comandos das Migrations
$application->addCommands([
    new \Doctrine\Migrations\Tools\Console\Command\CurrentCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\ExecuteCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\GenerateCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\LatestCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\MigrateCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\RollupCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\StatusCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\VersionCommand($dependencyFactory)
]);

// Executar a aplicação
$application->run();