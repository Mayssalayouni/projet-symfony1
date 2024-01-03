<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103135948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3868677A2');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F321CCA0EC');
        $this->addSql('DROP INDEX IDX_B8B4C6F3868677A2 ON equipement');
        $this->addSql('ALTER TABLE equipement CHANGE chervheur_att_id chercheur_att_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3123DED4E FOREIGN KEY (chercheur_att_id) REFERENCES chercheur (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F321CCA0EC FOREIGN KEY (projet_att_id) REFERENCES projet (id)');
        $this->addSql('CREATE INDEX IDX_B8B4C6F3123DED4E ON equipement (chercheur_att_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3123DED4E');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F321CCA0EC');
        $this->addSql('DROP INDEX IDX_B8B4C6F3123DED4E ON equipement');
        $this->addSql('ALTER TABLE equipement CHANGE chercheur_att_id chervheur_att_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3868677A2 FOREIGN KEY (chervheur_att_id) REFERENCES chercheur (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F321CCA0EC FOREIGN KEY (projet_att_id) REFERENCES chercheur (id)');
        $this->addSql('CREATE INDEX IDX_B8B4C6F3868677A2 ON equipement (chervheur_att_id)');
    }
}
