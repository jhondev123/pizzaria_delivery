<?php

declare(strict_types=1);

namespace Jhonattan\PizzariaDelivery\Infra\Persistence\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241124142842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $schema->createTable('users');
        $table = $schema->getTable('users');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string');
        $table->setPrimaryKey(['id']);

    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('users');
    }
}
