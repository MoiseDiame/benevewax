<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128171223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adult_veste_size ADD veste_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adult_veste_size ADD CONSTRAINT FK_66FA34DD73E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id)');
        $this->addSql('CREATE INDEX IDX_66FA34DD73E5BD0B ON adult_veste_size (veste_size_id)');
        $this->addSql('ALTER TABLE kids_veste_size ADD veste_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kids_veste_size ADD CONSTRAINT FK_FCEF344773E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id)');
        $this->addSql('CREATE INDEX IDX_FCEF344773E5BD0B ON kids_veste_size (veste_size_id)');
        $this->addSql('ALTER TABLE veste_size ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kids_veste_size DROP FOREIGN KEY FK_FCEF344773E5BD0B');
        $this->addSql('DROP INDEX IDX_FCEF344773E5BD0B ON kids_veste_size');
        $this->addSql('ALTER TABLE kids_veste_size DROP veste_size_id');
        $this->addSql('ALTER TABLE adult_veste_size DROP FOREIGN KEY FK_66FA34DD73E5BD0B');
        $this->addSql('DROP INDEX IDX_66FA34DD73E5BD0B ON adult_veste_size');
        $this->addSql('ALTER TABLE adult_veste_size DROP veste_size_id');
        $this->addSql('ALTER TABLE veste_size DROP name');
    }
}
