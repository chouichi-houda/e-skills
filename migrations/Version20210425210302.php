<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425210302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_Forma_Eval');
        $this->addSql('DROP INDEX id_form ON evaluation');
        $this->addSql('ALTER TABLE evaluation ADD idForm INT DEFAULT NULL, DROP id_form');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A5752175A3D1 FOREIGN KEY (idForm) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_1323A5752175A3D1 ON evaluation (idForm)');
        $this->addSql('ALTER TABLE question ADD evaluation_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E456C5646 FOREIGN KEY (evaluation_id) REFERENCES evaluation (eval_nom)');
        $this->addSql('CREATE INDEX IDX_B6F7494E456C5646 ON question (evaluation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A5752175A3D1');
        $this->addSql('DROP INDEX IDX_1323A5752175A3D1 ON evaluation');
        $this->addSql('ALTER TABLE evaluation ADD id_form INT NOT NULL, DROP idForm');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_Forma_Eval FOREIGN KEY (id_form) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX id_form ON evaluation (id_form)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E456C5646');
        $this->addSql('DROP INDEX IDX_B6F7494E456C5646 ON question');
        $this->addSql('ALTER TABLE question DROP evaluation_id');
    }
}
