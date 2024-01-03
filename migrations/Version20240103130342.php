<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103130342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chercheur_publication (chercheur_id INT NOT NULL, publication_id INT NOT NULL, INDEX IDX_57F20386F0950B34 (chercheur_id), INDEX IDX_57F2038638B217A7 (publication_id), PRIMARY KEY(chercheur_id, publication_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, chervheur_att_id INT DEFAULT NULL, projet_att_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, discription VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, disponibilite TINYINT(1) NOT NULL, INDEX IDX_B8B4C6F3868677A2 (chervheur_att_id), INDEX IDX_B8B4C6F321CCA0EC (projet_att_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chercheur_publication ADD CONSTRAINT FK_57F20386F0950B34 FOREIGN KEY (chercheur_id) REFERENCES chercheur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chercheur_publication ADD CONSTRAINT FK_57F2038638B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3868677A2 FOREIGN KEY (chervheur_att_id) REFERENCES chercheur (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F321CCA0EC FOREIGN KEY (projet_att_id) REFERENCES chercheur (id)');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1538B217A7');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('ALTER TABLE chercheur_projet ADD CONSTRAINT FK_414D615DF0950B34 FOREIGN KEY (chercheur_id) REFERENCES chercheur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chercheur_projet ADD CONSTRAINT FK_414D615DC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication ADD mots_cle VARCHAR(255) NOT NULL, CHANGE datepub date_pub DATE NOT NULL, CHANGE motcles projets VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, etat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, diponibilite TINYINT(1) NOT NULL, INDEX IDX_2449BA1538B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1538B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE chercheur_publication DROP FOREIGN KEY FK_57F20386F0950B34');
        $this->addSql('ALTER TABLE chercheur_publication DROP FOREIGN KEY FK_57F2038638B217A7');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3868677A2');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F321CCA0EC');
        $this->addSql('DROP TABLE chercheur_publication');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('ALTER TABLE chercheur_projet DROP FOREIGN KEY FK_414D615DF0950B34');
        $this->addSql('ALTER TABLE chercheur_projet DROP FOREIGN KEY FK_414D615DC18272');
        $this->addSql('ALTER TABLE publication ADD motcles VARCHAR(255) NOT NULL, DROP projets, DROP mots_cle, CHANGE date_pub datepub DATE NOT NULL');
    }
}
