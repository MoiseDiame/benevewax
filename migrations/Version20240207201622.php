<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207201622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_kids_veste_size DROP FOREIGN KEY FK_CE6431DA4584665A');
        $this->addSql('ALTER TABLE product_kids_veste_size DROP FOREIGN KEY FK_CE6431DA980B5297');
        $this->addSql('ALTER TABLE product_kids_shoe_size DROP FOREIGN KEY FK_4FFA984E4584665A');
        $this->addSql('ALTER TABLE product_kids_shoe_size DROP FOREIGN KEY FK_4FFA984E4C304CF6');
        $this->addSql('DROP TABLE adult_shoes_size');
        $this->addSql('DROP TABLE adult_veste_size');
        $this->addSql('DROP TABLE product_kids_veste_size');
        $this->addSql('DROP TABLE kids_shoe_size');
        $this->addSql('DROP TABLE product_kids_shoe_size');
        $this->addSql('DROP TABLE kids_veste_size');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adult_shoes_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE adult_veste_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_kids_veste_size (product_id INT NOT NULL, kids_veste_size_id INT NOT NULL, INDEX IDX_CE6431DA980B5297 (kids_veste_size_id), INDEX IDX_CE6431DA4584665A (product_id), PRIMARY KEY(product_id, kids_veste_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE kids_shoe_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_kids_shoe_size (product_id INT NOT NULL, kids_shoe_size_id INT NOT NULL, INDEX IDX_4FFA984E4584665A (product_id), INDEX IDX_4FFA984E4C304CF6 (kids_shoe_size_id), PRIMARY KEY(product_id, kids_shoe_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE kids_veste_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product_kids_veste_size ADD CONSTRAINT FK_CE6431DA4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_kids_veste_size ADD CONSTRAINT FK_CE6431DA980B5297 FOREIGN KEY (kids_veste_size_id) REFERENCES kids_veste_size (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_kids_shoe_size ADD CONSTRAINT FK_4FFA984E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_kids_shoe_size ADD CONSTRAINT FK_4FFA984E4C304CF6 FOREIGN KEY (kids_shoe_size_id) REFERENCES kids_shoe_size (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
