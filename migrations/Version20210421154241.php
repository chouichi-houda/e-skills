<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421154241 extends AbstractMigration
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
        $this->addSql('ALTER TABLE question CHANGE evaluation_id eval VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E4522BB5A FOREIGN KEY (eval) REFERENCES evaluation (eval_nom)');
        $this->addSql('CREATE INDEX IDX_B6F7494E4522BB5A ON question (eval)');
        $this->addSql('ALTER TABLE resultat CHANGE id_etud id_etud INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE statistique');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A5759CF0022');
        $this->addSql('DROP INDEX IDX_1323A5759CF0022 ON evaluation');
        $this->addSql('ALTER TABLE evaluation DROP formation_id_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E4522BB5A');
        $this->addSql('DROP INDEX IDX_B6F7494E4522BB5A ON question');
        $this->addSql('ALTER TABLE question CHANGE eval evaluation_id VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE resultat CHANGE id_etud id_etud INT NOT NULL');
    }
}
