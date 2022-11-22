<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221117225819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_on_partenaires (ref_admin_id INT NOT NULL, ref_partenaire_id INT NOT NULL, INDEX IDX_DBB7C66DE23C4497 (ref_admin_id), INDEX IDX_DBB7C66DBC8E44CC (ref_partenaire_id), PRIMARY KEY(ref_admin_id, ref_partenaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_on_users (ref_admins_id INT NOT NULL, ref_user_id INT NOT NULL, INDEX IDX_CB9B51689F88786 (ref_admins_id), INDEX IDX_CB9B516637A8045 (ref_user_id), PRIMARY KEY(ref_admins_id, ref_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concours (id INT AUTO_INCREMENT NOT NULL, nomconcours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE miage (id INT AUTO_INCREMENT NOT NULL, refconcours_id INT DEFAULT NULL, universite VARCHAR(255) NOT NULL, numtel INT NOT NULL, INDEX IDX_BFDF35C8689FFCA1 (refconcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, nom_societe VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, dons_ou_aides INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, ref_type_id INT NOT NULL, date DATETIME NOT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_42C84955158DF43 (ref_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_users (ref_statut_id INT NOT NULL, ref_user_id INT NOT NULL, INDEX IDX_267ECA97857A3941 (ref_statut_id), INDEX IDX_267ECA97637A8045 (ref_user_id), PRIMARY KEY(ref_statut_id, ref_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_reservation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, ref_miage_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, adresse VARCHAR(255) NOT NULL, telephone INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649CBB7C903 (ref_miage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_on_partenaires ADD CONSTRAINT FK_DBB7C66DE23C4497 FOREIGN KEY (ref_admin_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE admin_on_partenaires ADD CONSTRAINT FK_DBB7C66DBC8E44CC FOREIGN KEY (ref_partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('ALTER TABLE admin_on_users ADD CONSTRAINT FK_CB9B51689F88786 FOREIGN KEY (ref_admins_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE admin_on_users ADD CONSTRAINT FK_CB9B516637A8045 FOREIGN KEY (ref_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE miage ADD CONSTRAINT FK_BFDF35C8689FFCA1 FOREIGN KEY (refconcours_id) REFERENCES concours (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955158DF43 FOREIGN KEY (ref_type_id) REFERENCES type_reservation (id)');
        $this->addSql('ALTER TABLE statut_users ADD CONSTRAINT FK_267ECA97857A3941 FOREIGN KEY (ref_statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE statut_users ADD CONSTRAINT FK_267ECA97637A8045 FOREIGN KEY (ref_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CBB7C903 FOREIGN KEY (ref_miage_id) REFERENCES miage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_on_partenaires DROP FOREIGN KEY FK_DBB7C66DE23C4497');
        $this->addSql('ALTER TABLE admin_on_partenaires DROP FOREIGN KEY FK_DBB7C66DBC8E44CC');
        $this->addSql('ALTER TABLE admin_on_users DROP FOREIGN KEY FK_CB9B51689F88786');
        $this->addSql('ALTER TABLE admin_on_users DROP FOREIGN KEY FK_CB9B516637A8045');
        $this->addSql('ALTER TABLE miage DROP FOREIGN KEY FK_BFDF35C8689FFCA1');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955158DF43');
        $this->addSql('ALTER TABLE statut_users DROP FOREIGN KEY FK_267ECA97857A3941');
        $this->addSql('ALTER TABLE statut_users DROP FOREIGN KEY FK_267ECA97637A8045');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CBB7C903');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE admin_on_partenaires');
        $this->addSql('DROP TABLE admin_on_users');
        $this->addSql('DROP TABLE concours');
        $this->addSql('DROP TABLE miage');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE statut_users');
        $this->addSql('DROP TABLE type_reservation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
