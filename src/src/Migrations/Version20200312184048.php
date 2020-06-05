<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312184048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO `option`  (id, title) VALUES (1, 'color')");
        $this->addSql("INSERT INTO `option`  (id, title) VALUES (2, 'recommended square')");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql("DELETE FROM `option` WHERE title = 'color'");
        $this->addSql("DELETE FROM `option` WHERE title = 'recommended square'");
    }
}
