<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240204205219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adult_shoes_size DROP available');
        $this->addSql('ALTER TABLE adult_veste_size DROP available');
        $this->addSql('ALTER TABLE kids_shoe_size DROP available');
        $this->addSql('ALTER TABLE kids_veste_size DROP available');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adult_shoes_size ADD available TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE adult_veste_size ADD available TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE kids_shoe_size ADD available TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE kids_veste_size ADD available TINYINT(1) NOT NULL');
    }
}
