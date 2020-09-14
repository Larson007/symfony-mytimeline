<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200913163759 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, timeline_id INT DEFAULT NULL, year INT NOT NULL, month INT DEFAULT NULL, day INT DEFAULT NULL, time TIME DEFAULT NULL, end_year INT NOT NULL, end_month INT DEFAULT NULL, end_day INT DEFAULT NULL, end_time TIME DEFAULT NULL, display_date DATE DEFAULT NULL, headline VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, media VARCHAR(255) DEFAULT NULL, media_credit VARCHAR(255) DEFAULT NULL, media_caption VARCHAR(255) DEFAULT NULL, media_thumbnail VARCHAR(255) DEFAULT NULL, background VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_5387574AEDBEDD37 (timeline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AEDBEDD37 FOREIGN KEY (timeline_id) REFERENCES timelines (id)');
        $this->addSql('ALTER TABLE timelines ADD title VARCHAR(255) NOT NULL, ADD start_date INT NOT NULL, ADD end_date INT DEFAULT NULL, ADD description LONGTEXT NOT NULL, ADD publication_date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE events');
        $this->addSql('ALTER TABLE timelines DROP title, DROP start_date, DROP end_date, DROP description, DROP publication_date');
    }
}
