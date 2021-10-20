<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210109183000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE validation (id INT AUTO_INCREMENT NOT NULL, tache1_titre VARCHAR(255) NOT NULL, tache1_decision VARCHAR(255) NOT NULL, tache2_titre VARCHAR(255) NOT NULL, tache2__decision VARCHAR(255) NOT NULL, tache3_titre VARCHAR(255) NOT NULL, tache3_decision VARCHAR(255) NOT NULL, tache4_titre VARCHAR(255) NOT NULL, tache4_decision VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE validation');
    }
}
