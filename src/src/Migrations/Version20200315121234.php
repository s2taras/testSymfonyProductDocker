<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200315121234 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE option_value DROP FOREIGN KEY FK_249CE55C36799605');
        $this->addSql('DROP INDEX IDX_249CE55C36799605 ON option_value');
        $this->addSql('ALTER TABLE option_value DROP productId');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE option_value ADD productId INT NOT NULL');
        $this->addSql('ALTER TABLE option_value ADD CONSTRAINT FK_249CE55C36799605 FOREIGN KEY (productId) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_249CE55C36799605 ON option_value (productId)');
    }
}
