<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210418120838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statistique (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evaluation ADD formation_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A5759CF0022 FOREIGN KEY (formation_id_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_1323A5759CF0022 ON evaluation (formation_id_id)');
        $this->addSql('ALTER TABLE resultat CHANGE id_etud id_etud INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE statistique');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A5759CF0022');
        $this->addSql('DROP INDEX IDX_1323A5759CF0022 ON evaluation');
        $this->addSql('ALTER TABLE evaluation DROP formation_id_id');
        $this->addSql('ALTER TABLE resultat CHANGE id_etud id_etud INT NOT NULL');
    }
}
