<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128172021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CB73E5BD0B');
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CBACE9EF33');
        $this->addSql('DROP INDEX UNIQ_7A2806CBACE9EF33 ON product_size');
        $this->addSql('DROP INDEX UNIQ_7A2806CB73E5BD0B ON product_size');
        $this->addSql('ALTER TABLE product_size DROP veste_size_id, DROP shoe_size_id, DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_size ADD veste_size_id INT DEFAULT NULL, ADD shoe_size_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CB73E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CBACE9EF33 FOREIGN KEY (shoe_size_id) REFERENCES shoe_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A2806CBACE9EF33 ON product_size (shoe_size_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A2806CB73E5BD0B ON product_size (veste_size_id)');
    }
}
