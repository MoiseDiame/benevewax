<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211204805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD shop_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC0316BF2 FOREIGN KEY (shop_category_id) REFERENCES shop_category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADC0316BF2 ON product (shop_category_id)');
        $this->addSql('ALTER TABLE shop_category ADD picture VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop_category DROP picture');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC0316BF2');
        $this->addSql('DROP INDEX IDX_D34A04ADC0316BF2 ON product');
        $this->addSql('ALTER TABLE product DROP shop_category_id');
    }
}
