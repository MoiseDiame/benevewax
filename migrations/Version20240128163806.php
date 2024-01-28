<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128163806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE veste_size (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veste_size_kids_veste_size (veste_size_id INT NOT NULL, kids_veste_size_id INT NOT NULL, INDEX IDX_C3E1F54B73E5BD0B (veste_size_id), INDEX IDX_C3E1F54B980B5297 (kids_veste_size_id), PRIMARY KEY(veste_size_id, kids_veste_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veste_size_adult_veste_size (veste_size_id INT NOT NULL, adult_veste_size_id INT NOT NULL, INDEX IDX_6F73763773E5BD0B (veste_size_id), INDEX IDX_6F7376375528BC0 (adult_veste_size_id), PRIMARY KEY(veste_size_id, adult_veste_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE veste_size_kids_veste_size ADD CONSTRAINT FK_C3E1F54B73E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veste_size_kids_veste_size ADD CONSTRAINT FK_C3E1F54B980B5297 FOREIGN KEY (kids_veste_size_id) REFERENCES kids_veste_size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veste_size_adult_veste_size ADD CONSTRAINT FK_6F73763773E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veste_size_adult_veste_size ADD CONSTRAINT FK_6F7376375528BC0 FOREIGN KEY (adult_veste_size_id) REFERENCES adult_veste_size (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veste_size_kids_veste_size DROP FOREIGN KEY FK_C3E1F54B73E5BD0B');
        $this->addSql('ALTER TABLE veste_size_kids_veste_size DROP FOREIGN KEY FK_C3E1F54B980B5297');
        $this->addSql('ALTER TABLE veste_size_adult_veste_size DROP FOREIGN KEY FK_6F73763773E5BD0B');
        $this->addSql('ALTER TABLE veste_size_adult_veste_size DROP FOREIGN KEY FK_6F7376375528BC0');
        $this->addSql('DROP TABLE veste_size');
        $this->addSql('DROP TABLE veste_size_kids_veste_size');
        $this->addSql('DROP TABLE veste_size_adult_veste_size');
    }
}
