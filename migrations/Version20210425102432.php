<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425102432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E456C5646 FOREIGN KEY (evaluation_id) REFERENCES evaluation (eval_nom)');
        $this->addSql('CREATE INDEX IDX_B6F7494E456C5646 ON question (evaluation_id)');
        $this->addSql('ALTER TABLE resultat ADD evalres_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2F018DC0E FOREIGN KEY (evalres_id) REFERENCES evaluation (eval_nom)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2F018DC0E ON resultat (evalres_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E456C5646');
        $this->addSql('DROP INDEX IDX_B6F7494E456C5646 ON question');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2F018DC0E');
        $this->addSql('DROP INDEX IDX_E7DB5DE2F018DC0E ON resultat');
        $this->addSql('ALTER TABLE resultat DROP evalres_id');
    }
}
