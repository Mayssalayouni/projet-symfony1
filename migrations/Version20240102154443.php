<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102154443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe ADD researcher_id INT DEFAULT NULL, ADD publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15C7533BDE FOREIGN KEY (researcher_id) REFERENCES researcher (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1538B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_2449BA15C7533BDE ON equipe (researcher_id)');
        $this->addSql('CREATE INDEX IDX_2449BA1538B217A7 ON equipe (publication_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15C7533BDE');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1538B217A7');
        $this->addSql('DROP INDEX IDX_2449BA15C7533BDE ON equipe');
        $this->addSql('DROP INDEX IDX_2449BA1538B217A7 ON equipe');
        $this->addSql('ALTER TABLE equipe DROP researcher_id, DROP publication_id');
    }
}
