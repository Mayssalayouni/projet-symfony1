<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240101204616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication ADD auteur VARCHAR(255) NOT NULL, ADD datepub DATE NOT NULL, ADD resume VARCHAR(255) NOT NULL, ADD motcles VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE researcher ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user DROP userid');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication DROP auteur, DROP datepub, DROP resume, DROP motcles');
        $this->addSql('ALTER TABLE researcher DROP password');
        $this->addSql('ALTER TABLE `user` ADD userid INT NOT NULL');
    }
}
