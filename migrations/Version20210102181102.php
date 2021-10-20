<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210102181102 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attend ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD date_naiss VARCHAR(255) NOT NULL, ADD nationalite VARCHAR(255) NOT NULL, ADD qualite VARCHAR(255) NOT NULL, ADD add_mail VARCHAR(255) NOT NULL, ADD add_domicil VARCHAR(255) NOT NULL, ADD add_ens_acc VARCHAR(255) NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD domaine VARCHAR(255) NOT NULL, ADD date VARCHAR(255) NOT NULL, DROP ficher_pdf');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attend ADD ficher_pdf LONGBLOB NOT NULL, DROP nom, DROP prenom, DROP date_naiss, DROP nationalite, DROP qualite, DROP add_mail, DROP add_domicil, DROP add_ens_acc, DROP titre, DROP type, DROP domaine, DROP date');
    }
}
