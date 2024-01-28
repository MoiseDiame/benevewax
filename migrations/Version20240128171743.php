<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128171743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_size (id INT AUTO_INCREMENT NOT NULL, veste_size_id INT DEFAULT NULL, shoe_size_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7A2806CB73E5BD0B (veste_size_id), UNIQUE INDEX UNIQ_7A2806CBACE9EF33 (shoe_size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CB73E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id)');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CBACE9EF33 FOREIGN KEY (shoe_size_id) REFERENCES shoe_size (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CB73E5BD0B');
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CBACE9EF33');
        $this->addSql('DROP TABLE product_size');
    }
}
