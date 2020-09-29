<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200928190234 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE text (id INT AUTO_INCREMENT NOT NULL, events_id INT DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_3B8BA7C79D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE start_date (id INT AUTO_INCREMENT NOT NULL, events_id INT DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, month VARCHAR(255) DEFAULT NULL, day VARCHAR(255) DEFAULT NULL, INDEX IDX_95275AB89D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, events_id INT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, caption VARCHAR(255) DEFAULT NULL, credit VARCHAR(255) DEFAULT NULL, INDEX IDX_6A2CA10C9D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE background (id INT AUTO_INCREMENT NOT NULL, events_id INT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, INDEX IDX_BC68B4509D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE text ADD CONSTRAINT FK_3B8BA7C79D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE start_date ADD CONSTRAINT FK_95275AB89D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C9D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE background ADD CONSTRAINT FK_BC68B4509D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE background');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE start_date');
        $this->addSql('DROP TABLE text');
    }
}
