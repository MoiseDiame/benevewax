<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240130212143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD498DA827');
        $this->addSql('ALTER TABLE adult_shoes_size DROP FOREIGN KEY FK_4EAE4A56ACE9EF33');
        $this->addSql('ALTER TABLE kids_shoe_size DROP FOREIGN KEY FK_1C93E662ACE9EF33');
        $this->addSql('ALTER TABLE kids_veste_size DROP FOREIGN KEY FK_FCEF344773E5BD0B');
        $this->addSql('ALTER TABLE adult_veste_size DROP FOREIGN KEY FK_66FA34DD73E5BD0B');
        $this->addSql('DROP TABLE product_size');
        $this->addSql('DROP TABLE shoe_size');
        $this->addSql('DROP TABLE veste_size');
        $this->addSql('DROP INDEX IDX_4EAE4A56ACE9EF33 ON adult_shoes_size');
        $this->addSql('ALTER TABLE adult_shoes_size DROP shoe_size_id');
        $this->addSql('DROP INDEX IDX_66FA34DD73E5BD0B ON adult_veste_size');
        $this->addSql('ALTER TABLE adult_veste_size DROP veste_size_id');
        $this->addSql('DROP INDEX IDX_1C93E662ACE9EF33 ON kids_shoe_size');
        $this->addSql('ALTER TABLE kids_shoe_size DROP shoe_size_id');
        $this->addSql('DROP INDEX IDX_FCEF344773E5BD0B ON kids_veste_size');
        $this->addSql('ALTER TABLE kids_veste_size DROP veste_size_id');
        $this->addSql('DROP INDEX IDX_D34A04AD498DA827 ON product');
        $this->addSql('ALTER TABLE product DROP size_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE shoe_size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE veste_size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adult_shoes_size ADD shoe_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adult_shoes_size ADD CONSTRAINT FK_4EAE4A56ACE9EF33 FOREIGN KEY (shoe_size_id) REFERENCES shoe_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4EAE4A56ACE9EF33 ON adult_shoes_size (shoe_size_id)');
        $this->addSql('ALTER TABLE kids_veste_size ADD veste_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kids_veste_size ADD CONSTRAINT FK_FCEF344773E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FCEF344773E5BD0B ON kids_veste_size (veste_size_id)');
        $this->addSql('ALTER TABLE product ADD size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD498DA827 FOREIGN KEY (size_id) REFERENCES product_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04AD498DA827 ON product (size_id)');
        $this->addSql('ALTER TABLE kids_shoe_size ADD shoe_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kids_shoe_size ADD CONSTRAINT FK_1C93E662ACE9EF33 FOREIGN KEY (shoe_size_id) REFERENCES shoe_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1C93E662ACE9EF33 ON kids_shoe_size (shoe_size_id)');
        $this->addSql('ALTER TABLE adult_veste_size ADD veste_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adult_veste_size ADD CONSTRAINT FK_66FA34DD73E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_66FA34DD73E5BD0B ON adult_veste_size (veste_size_id)');
    }
}
