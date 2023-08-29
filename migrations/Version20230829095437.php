<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829095437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film_sub_genre (film_id INT NOT NULL, sub_genre_id INT NOT NULL, PRIMARY KEY(film_id, sub_genre_id))');
        $this->addSql('CREATE INDEX IDX_5BD80972567F5183 ON film_sub_genre (film_id)');
        $this->addSql('CREATE INDEX IDX_5BD80972F8393D46 ON film_sub_genre (sub_genre_id)');
        $this->addSql('ALTER TABLE film_sub_genre ADD CONSTRAINT FK_5BD80972567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE film_sub_genre ADD CONSTRAINT FK_5BD80972F8393D46 FOREIGN KEY (sub_genre_id) REFERENCES sub_genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE film_sub_genre DROP CONSTRAINT FK_5BD80972567F5183');
        $this->addSql('ALTER TABLE film_sub_genre DROP CONSTRAINT FK_5BD80972F8393D46');
        $this->addSql('DROP TABLE film_sub_genre');
    }
}
