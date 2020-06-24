<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624123348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hopital ADD pay_id INT NOT NULL');
        $this->addSql('ALTER TABLE hopital ADD CONSTRAINT FK_8718F2C918501AB FOREIGN KEY (pay_id) REFERENCES pay (id)');
        $this->addSql('CREATE INDEX IDX_8718F2C918501AB ON hopital (pay_id)');
        $this->addSql('ALTER TABLE medecin ADD soin_id INT NOT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C66F952169 FOREIGN KEY (soin_id) REFERENCES soin (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C66F952169 ON medecin (soin_id)');
        $this->addSql('ALTER TABLE soin ADD hopital_id INT NOT NULL');
        $this->addSql('ALTER TABLE soin ADD CONSTRAINT FK_570C0C2CC0FBF92 FOREIGN KEY (hopital_id) REFERENCES hopital (id)');
        $this->addSql('CREATE INDEX IDX_570C0C2CC0FBF92 ON soin (hopital_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hopital DROP FOREIGN KEY FK_8718F2C918501AB');
        $this->addSql('DROP INDEX IDX_8718F2C918501AB ON hopital');
        $this->addSql('ALTER TABLE hopital DROP pay_id');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C66F952169');
        $this->addSql('DROP INDEX IDX_1BDA53C66F952169 ON medecin');
        $this->addSql('ALTER TABLE medecin DROP soin_id');
        $this->addSql('ALTER TABLE soin DROP FOREIGN KEY FK_570C0C2CC0FBF92');
        $this->addSql('DROP INDEX IDX_570C0C2CC0FBF92 ON soin');
        $this->addSql('ALTER TABLE soin DROP hopital_id');
    }
}
