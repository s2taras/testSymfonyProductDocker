<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200311185524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(60) NOT NULL, price NUMERIC(10, 0) DEFAULT NULL, createdAt DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ProductsOptions (productId INT NOT NULL, optionId INT NOT NULL, INDEX IDX_E84D912C36799605 (productId), INDEX IDX_E84D912CCE78B7CC (optionId), PRIMARY KEY(productId, optionId)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ProductsOptions ADD CONSTRAINT FK_E84D912C36799605 FOREIGN KEY (productId) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ProductsOptions ADD CONSTRAINT FK_E84D912CCE78B7CC FOREIGN KEY (optionId) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ProductsOptions DROP FOREIGN KEY FK_E84D912CCE78B7CC');
        $this->addSql('ALTER TABLE ProductsOptions DROP FOREIGN KEY FK_E84D912C36799605');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE ProductsOptions');
    }
}
