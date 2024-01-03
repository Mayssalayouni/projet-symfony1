<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102153654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE publication_researcher (publication_id INT NOT NULL, researcher_id INT NOT NULL, INDEX IDX_1B886B3F38B217A7 (publication_id), INDEX IDX_1B886B3FC7533BDE (researcher_id), PRIMARY KEY(publication_id, researcher_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publication_researcher ADD CONSTRAINT FK_1B886B3F38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_researcher ADD CONSTRAINT FK_1B886B3FC7533BDE FOREIGN KEY (researcher_id) REFERENCES researcher (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication_researcher DROP FOREIGN KEY FK_1B886B3F38B217A7');
        $this->addSql('ALTER TABLE publication_researcher DROP FOREIGN KEY FK_1B886B3FC7533BDE');
        $this->addSql('DROP TABLE publication_researcher');
    }
}
