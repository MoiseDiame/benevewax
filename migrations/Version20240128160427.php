<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128160427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adult_shoes_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, available VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adult_veste_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kids_shoe_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kids_veste_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, available TINYINT(1) NOT NULL, prez_picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_size (id INT AUTO_INCREMENT NOT NULL, shoe_size_id INT DEFAULT NULL, veste_size_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_7A2806CBACE9EF33 (shoe_size_id), UNIQUE INDEX UNIQ_7A2806CB73E5BD0B (veste_size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoe_size (id INT AUTO_INCREMENT NOT NULL, kids_shoe_size_id INT DEFAULT NULL, adult_shoe_size_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_652951394C304CF6 (kids_shoe_size_id), UNIQUE INDEX UNIQ_65295139C79EB473 (adult_shoe_size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veste_size (id INT AUTO_INCREMENT NOT NULL, kid_size_id INT DEFAULT NULL, adult_size_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_2F068C6CE8C9B1 (kid_size_id), UNIQUE INDEX UNIQ_2F068C46430C8B (adult_size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CBACE9EF33 FOREIGN KEY (shoe_size_id) REFERENCES shoe_size (id)');
        $this->addSql('ALTER TABLE product_size ADD CONSTRAINT FK_7A2806CB73E5BD0B FOREIGN KEY (veste_size_id) REFERENCES veste_size (id)');
        $this->addSql('ALTER TABLE shoe_size ADD CONSTRAINT FK_652951394C304CF6 FOREIGN KEY (kids_shoe_size_id) REFERENCES kids_shoe_size (id)');
        $this->addSql('ALTER TABLE shoe_size ADD CONSTRAINT FK_65295139C79EB473 FOREIGN KEY (adult_shoe_size_id) REFERENCES adult_shoes_size (id)');
        $this->addSql('ALTER TABLE veste_size ADD CONSTRAINT FK_2F068C6CE8C9B1 FOREIGN KEY (kid_size_id) REFERENCES kids_veste_size (id)');
        $this->addSql('ALTER TABLE veste_size ADD CONSTRAINT FK_2F068C46430C8B FOREIGN KEY (adult_size_id) REFERENCES adult_veste_size (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CBACE9EF33');
        $this->addSql('ALTER TABLE product_size DROP FOREIGN KEY FK_7A2806CB73E5BD0B');
        $this->addSql('ALTER TABLE shoe_size DROP FOREIGN KEY FK_652951394C304CF6');
        $this->addSql('ALTER TABLE shoe_size DROP FOREIGN KEY FK_65295139C79EB473');
        $this->addSql('ALTER TABLE veste_size DROP FOREIGN KEY FK_2F068C6CE8C9B1');
        $this->addSql('ALTER TABLE veste_size DROP FOREIGN KEY FK_2F068C46430C8B');
        $this->addSql('DROP TABLE adult_shoes_size');
        $this->addSql('DROP TABLE adult_veste_size');
        $this->addSql('DROP TABLE kids_shoe_size');
        $this->addSql('DROP TABLE kids_veste_size');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE product_size');
        $this->addSql('DROP TABLE shoe_size');
        $this->addSql('DROP TABLE shop_category');
        $this->addSql('DROP TABLE veste_size');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
