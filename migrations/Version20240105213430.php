<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240105213430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chercheur_publication (chercheur_id INT NOT NULL, publication_id INT NOT NULL, INDEX IDX_57F20386F0950B34 (chercheur_id), INDEX IDX_57F2038638B217A7 (publication_id), PRIMARY KEY(chercheur_id, publication_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, chercheur_att_id INT DEFAULT NULL, projet_att_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, discription VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, disponibilite TINYINT(1) NOT NULL, INDEX IDX_B8B4C6F3123DED4E (chercheur_att_id), INDEX IDX_B8B4C6F321CCA0EC (projet_att_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, date_pub DATE NOT NULL, resume VARCHAR(255) NOT NULL, projets VARCHAR(255) NOT NULL, mots_cle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chercheur_publication ADD CONSTRAINT FK_57F20386F0950B34 FOREIGN KEY (chercheur_id) REFERENCES chercheur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chercheur_publication ADD CONSTRAINT FK_57F2038638B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3123DED4E FOREIGN KEY (chercheur_att_id) REFERENCES chercheur (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F321CCA0EC FOREIGN KEY (projet_att_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chercheur_publication DROP FOREIGN KEY FK_57F20386F0950B34');
        $this->addSql('ALTER TABLE chercheur_publication DROP FOREIGN KEY FK_57F2038638B217A7');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3123DED4E');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F321CCA0EC');
        $this->addSql('DROP TABLE chercheur_publication');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE publication');
    }
}
