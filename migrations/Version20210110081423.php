<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110081423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validation ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD add_mail VARCHAR(255) NOT NULL, ADD add_domicil VARCHAR(255) NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD date VARCHAR(255) NOT NULL, ADD titre_projet VARCHAR(255) NOT NULL, ADD universite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validation DROP nom, DROP prenom, DROP add_mail, DROP add_domicil, DROP titre, DROP type, DROP date, DROP titre_projet, DROP universite');
    }
}
