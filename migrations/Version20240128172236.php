<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128172236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_size ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shoe_size ADD product_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shoe_size ADD CONSTRAINT FK_652951399854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id)');
        $this->addSql('CREATE INDEX IDX_652951399854B397 ON shoe_size (product_size_id)');
        $this->addSql('ALTER TABLE veste_size ADD product_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE veste_size ADD CONSTRAINT FK_2F068C9854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id)');
        $this->addSql('CREATE INDEX IDX_2F068C9854B397 ON veste_size (product_size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shoe_size DROP FOREIGN KEY FK_652951399854B397');
        $this->addSql('DROP INDEX IDX_652951399854B397 ON shoe_size');
        $this->addSql('ALTER TABLE shoe_size DROP product_size_id');
        $this->addSql('ALTER TABLE product_size DROP name');
        $this->addSql('ALTER TABLE veste_size DROP FOREIGN KEY FK_2F068C9854B397');
        $this->addSql('DROP INDEX IDX_2F068C9854B397 ON veste_size');
        $this->addSql('ALTER TABLE veste_size DROP product_size_id');
    }
}
