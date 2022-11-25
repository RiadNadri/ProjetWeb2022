<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125144004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activites (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logement (id INT AUTO_INCREMENT NOT NULL, localisation VARCHAR(255) NOT NULL, tarif DOUBLE PRECISION NOT NULL, distance INT NOT NULL, moyens_transport VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, forfait_navigo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD ref_logement_id INT DEFAULT NULL, ADD ref_transport_id INT DEFAULT NULL, ADD ref_activite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A2A201D9 FOREIGN KEY (ref_logement_id) REFERENCES logement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849557DFD07CC FOREIGN KEY (ref_transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556106703D FOREIGN KEY (ref_activite_id) REFERENCES activites (id)');
        $this->addSql('CREATE INDEX IDX_42C84955A2A201D9 ON reservation (ref_logement_id)');
        $this->addSql('CREATE INDEX IDX_42C849557DFD07CC ON reservation (ref_transport_id)');
        $this->addSql('CREATE INDEX IDX_42C849556106703D ON reservation (ref_activite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556106703D');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A2A201D9');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849557DFD07CC');
        $this->addSql('DROP TABLE activites');
        $this->addSql('DROP TABLE logement');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP INDEX IDX_42C84955A2A201D9 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849557DFD07CC ON reservation');
        $this->addSql('DROP INDEX IDX_42C849556106703D ON reservation');
        $this->addSql('ALTER TABLE reservation DROP ref_logement_id, DROP ref_transport_id, DROP ref_activite_id');
    }
}
