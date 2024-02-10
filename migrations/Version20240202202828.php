<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202202828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_product_size DROP FOREIGN KEY FK_F78C24A04584665A');
        $this->addSql('ALTER TABLE product_product_size DROP FOREIGN KEY FK_F78C24A09854B397');
        $this->addSql('DROP TABLE product_product_size');
        $this->addSql('ALTER TABLE adult_shoes_size DROP FOREIGN KEY FK_4EAE4A569854B397');
        $this->addSql('DROP INDEX IDX_4EAE4A569854B397 ON adult_shoes_size');
        $this->addSql('ALTER TABLE adult_shoes_size DROP product_size_id');
        $this->addSql('ALTER TABLE adult_veste_size DROP FOREIGN KEY FK_66FA34DD9854B397');
        $this->addSql('DROP INDEX IDX_66FA34DD9854B397 ON adult_veste_size');
        $this->addSql('ALTER TABLE adult_veste_size DROP product_size_id');
        $this->addSql('ALTER TABLE kids_shoe_size DROP FOREIGN KEY FK_1C93E6629854B397');
        $this->addSql('DROP INDEX IDX_1C93E6629854B397 ON kids_shoe_size');
        $this->addSql('ALTER TABLE kids_shoe_size DROP product_size_id');
        $this->addSql('ALTER TABLE kids_veste_size DROP FOREIGN KEY FK_FCEF34479854B397');
        $this->addSql('DROP INDEX IDX_FCEF34479854B397 ON kids_veste_size');
        $this->addSql('ALTER TABLE kids_veste_size DROP product_size_id');
        $this->addSql('ALTER TABLE product_size DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_product_size (product_id INT NOT NULL, product_size_id INT NOT NULL, INDEX IDX_F78C24A09854B397 (product_size_id), INDEX IDX_F78C24A04584665A (product_id), PRIMARY KEY(product_id, product_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product_product_size ADD CONSTRAINT FK_F78C24A04584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_product_size ADD CONSTRAINT FK_F78C24A09854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kids_veste_size ADD product_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kids_veste_size ADD CONSTRAINT FK_FCEF34479854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FCEF34479854B397 ON kids_veste_size (product_size_id)');
        $this->addSql('ALTER TABLE adult_shoes_size ADD product_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adult_shoes_size ADD CONSTRAINT FK_4EAE4A569854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4EAE4A569854B397 ON adult_shoes_size (product_size_id)');
        $this->addSql('ALTER TABLE kids_shoe_size ADD product_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kids_shoe_size ADD CONSTRAINT FK_1C93E6629854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1C93E6629854B397 ON kids_shoe_size (product_size_id)');
        $this->addSql('ALTER TABLE product_size ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE adult_veste_size ADD product_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adult_veste_size ADD CONSTRAINT FK_66FA34DD9854B397 FOREIGN KEY (product_size_id) REFERENCES product_size (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_66FA34DD9854B397 ON adult_veste_size (product_size_id)');
    }
}
