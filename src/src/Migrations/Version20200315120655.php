<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200315120655 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE option_value (id INT AUTO_INCREMENT NOT NULL, optionId INT NOT NULL, productId INT NOT NULL, INDEX IDX_249CE55CCE78B7CC (optionId), INDEX IDX_249CE55C36799605 (productId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE option_value ADD CONSTRAINT FK_249CE55CCE78B7CC FOREIGN KEY (optionId) REFERENCES `option` (id)');
        $this->addSql('ALTER TABLE option_value ADD CONSTRAINT FK_249CE55C36799605 FOREIGN KEY (productId) REFERENCES product (id)');
        $this->addSql('DROP TABLE ProductsOptions');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ProductsOptions (productId INT NOT NULL, optionId INT NOT NULL, INDEX IDX_E84D912CCE78B7CC (optionId), INDEX IDX_E84D912C36799605 (productId), PRIMARY KEY(productId, optionId)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ProductsOptions ADD CONSTRAINT FK_E84D912C36799605 FOREIGN KEY (productId) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ProductsOptions ADD CONSTRAINT FK_E84D912CCE78B7CC FOREIGN KEY (optionId) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE option_value');
    }
}
