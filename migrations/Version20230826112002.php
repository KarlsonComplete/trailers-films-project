<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230826112002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE country_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE film_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE year_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE film (id INT NOT NULL, year_id INT NOT NULL, name VARCHAR(155) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8244BE2240C1FEA7 ON film (year_id)');
        $this->addSql('CREATE TABLE film_country (film_id INT NOT NULL, country_id INT NOT NULL, PRIMARY KEY(film_id, country_id))');
        $this->addSql('CREATE INDEX IDX_B3CDD245567F5183 ON film_country (film_id)');
        $this->addSql('CREATE INDEX IDX_B3CDD245F92F3E70 ON film_country (country_id)');
        $this->addSql('CREATE TABLE year (id INT NOT NULL, year VARCHAR(4) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2240C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE film_country ADD CONSTRAINT FK_B3CDD245567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE film_country ADD CONSTRAINT FK_B3CDD245F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE country_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE film_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE year_id_seq CASCADE');
        $this->addSql('ALTER TABLE film DROP CONSTRAINT FK_8244BE2240C1FEA7');
        $this->addSql('ALTER TABLE film_country DROP CONSTRAINT FK_B3CDD245567F5183');
        $this->addSql('ALTER TABLE film_country DROP CONSTRAINT FK_B3CDD245F92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_country');
        $this->addSql('DROP TABLE year');
    }
}
