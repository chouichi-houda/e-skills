<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425222612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_Forma_Eval');
        $this->addSql('ALTER TABLE evaluation CHANGE id_form id_form INT DEFAULT NULL');
        $this->addSql('DROP INDEX id_form ON evaluation');
        $this->addSql('CREATE INDEX IDX_1323A575D9A8E14D ON evaluation (id_form)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_Forma_Eval FOREIGN KEY (id_form) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E456C5646 FOREIGN KEY (evaluation_id) REFERENCES evaluation (eval_nom)');
        $this->addSql('CREATE INDEX IDX_B6F7494E456C5646 ON question (evaluation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A575D9A8E14D');
        $this->addSql('ALTER TABLE evaluation CHANGE id_form id_form INT NOT NULL');
        $this->addSql('DROP INDEX idx_1323a575d9a8e14d ON evaluation');
        $this->addSql('CREATE INDEX id_form ON evaluation (id_form)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575D9A8E14D FOREIGN KEY (id_form) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E456C5646');
        $this->addSql('DROP INDEX IDX_B6F7494E456C5646 ON question');
    }
}
