<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202131244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_statut (user_id INT NOT NULL, statut_id INT NOT NULL, INDEX IDX_8036EB82A76ED395 (user_id), INDEX IDX_8036EB82F6203804 (statut_id), PRIMARY KEY(user_id, statut_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_statut ADD CONSTRAINT FK_8036EB82A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_statut ADD CONSTRAINT FK_8036EB82F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_statut DROP FOREIGN KEY FK_8036EB82A76ED395');
        $this->addSql('ALTER TABLE user_statut DROP FOREIGN KEY FK_8036EB82F6203804');
        $this->addSql('DROP TABLE user_statut');
    }
}
