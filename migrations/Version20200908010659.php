<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908010659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE timelines (id INT AUTO_INCREMENT NOT NULL, year INT DEFAULT NULL, month INT DEFAULT NULL, day INT DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, media VARCHAR(255) DEFAULT NULL, mediacredit VARCHAR(255) DEFAULT NULL, mediacaption VARCHAR(255) DEFAULT NULL, mediathumbnail VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, background VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE timelines');
    }
}
