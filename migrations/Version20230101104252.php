<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230101104252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_activite (user_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_58F8B115A76ED395 (user_id), INDEX IDX_58F8B1159B0F88B1 (activite_id), PRIMARY KEY(user_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_activite ADD CONSTRAINT FK_58F8B115A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_activite ADD CONSTRAINT FK_58F8B1159B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD ref_titre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649535868D9 FOREIGN KEY (ref_titre_id) REFERENCES titre_transport (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649535868D9 ON user (ref_titre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_activite DROP FOREIGN KEY FK_58F8B115A76ED395');
        $this->addSql('ALTER TABLE user_activite DROP FOREIGN KEY FK_58F8B1159B0F88B1');
        $this->addSql('DROP TABLE user_activite');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649535868D9');
        $this->addSql('DROP INDEX IDX_8D93D649535868D9 ON user');
        $this->addSql('ALTER TABLE user DROP ref_titre_id');
    }
}
