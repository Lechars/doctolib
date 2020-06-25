<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625120713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hopital (id INT AUTO_INCREMENT NOT NULL, pay_id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, gps VARCHAR(255) NOT NULL, tarif INT NOT NULL, INDEX IDX_8718F2C918501AB (pay_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, soin_id INT NOT NULL, nom VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, INDEX IDX_1BDA53C66F952169 (soin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pay (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soin (id INT AUTO_INCREMENT NOT NULL, hopital_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix INT NOT NULL, durée_traitement INT NOT NULL, duree_hospitalisation INT NOT NULL, INDEX IDX_570C0C2CC0FBF92 (hopital_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hopital ADD CONSTRAINT FK_8718F2C918501AB FOREIGN KEY (pay_id) REFERENCES pay (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C66F952169 FOREIGN KEY (soin_id) REFERENCES soin (id)');
        $this->addSql('ALTER TABLE soin ADD CONSTRAINT FK_570C0C2CC0FBF92 FOREIGN KEY (hopital_id) REFERENCES hopital (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soin DROP FOREIGN KEY FK_570C0C2CC0FBF92');
        $this->addSql('ALTER TABLE hopital DROP FOREIGN KEY FK_8718F2C918501AB');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C66F952169');
        $this->addSql('DROP TABLE hopital');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE pay');
        $this->addSql('DROP TABLE soin');
    }
}
