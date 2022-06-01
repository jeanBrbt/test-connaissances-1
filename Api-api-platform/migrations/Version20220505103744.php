<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505103744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, id_organisation_id INT NOT NULL, nom VARCHAR(25) NOT NULL, INDEX IDX_E16F61D47735D60D (id_organisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece (id INT AUTO_INCREMENT NOT NULL, id_building_id INT NOT NULL, nom VARCHAR(25) NOT NULL, personnes_presentes INT NOT NULL, INDEX IDX_44CA0B235538B3E5 (id_building_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE building ADD CONSTRAINT FK_E16F61D47735D60D FOREIGN KEY (id_organisation_id) REFERENCES organisation (id)');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B235538B3E5 FOREIGN KEY (id_building_id) REFERENCES building (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B235538B3E5');
        $this->addSql('ALTER TABLE building DROP FOREIGN KEY FK_E16F61D47735D60D');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE organisation');
        $this->addSql('DROP TABLE piece');
    }
}
