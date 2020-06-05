<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200315122559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE option_value_product ADD CONSTRAINT FK_AAF6D51536799605 FOREIGN KEY (productId) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_value_product ADD CONSTRAINT FK_AAF6D51581F9A87C FOREIGN KEY (optionValueId) REFERENCES option_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_value_product RENAME INDEX idx_21bb2e8236799605 TO IDX_AAF6D51536799605');
        $this->addSql('ALTER TABLE option_value_product RENAME INDEX idx_21bb2e8281f9a87c TO IDX_AAF6D51581F9A87C');

        $this->addSql("INSERT INTO `option_value`  (id, optionId, value) VALUES (1, 1, 'red')");
        $this->addSql("INSERT INTO `option_value`  (id, optionId, value) VALUES (2, 1, 'white')");
        $this->addSql("INSERT INTO `option_value`  (id, optionId, value) VALUES (3, 1, 'black')");
        $this->addSql("INSERT INTO `option_value`  (id, optionId, value) VALUES (4, 2, '25+ sq.')");
        $this->addSql("INSERT INTO `option_value`  (id, optionId, value) VALUES (5, 2, '35+ sq.')");
        $this->addSql("INSERT INTO `option_value`  (id, optionId, value) VALUES (6, 2, '40+ sq.')");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE option_value_product DROP FOREIGN KEY FK_AAF6D51536799605');
        $this->addSql('ALTER TABLE option_value_product DROP FOREIGN KEY FK_AAF6D51581F9A87C');
        $this->addSql('ALTER TABLE option_value_product RENAME INDEX idx_aaf6d51536799605 TO IDX_21BB2E8236799605');
        $this->addSql('ALTER TABLE option_value_product RENAME INDEX idx_aaf6d51581f9a87c TO IDX_21BB2E8281F9A87C');

        $this->addSql("DELETE FROM `option_value` WHERE id = 1");
        $this->addSql("DELETE FROM `option_value` WHERE id = 2");
        $this->addSql("DELETE FROM `option_value` WHERE id = 3");
        $this->addSql("DELETE FROM `option_value` WHERE id = 4");
        $this->addSql("DELETE FROM `option_value` WHERE id = 5");
        $this->addSql("DELETE FROM `option_value` WHERE id = 6");
    }
}
