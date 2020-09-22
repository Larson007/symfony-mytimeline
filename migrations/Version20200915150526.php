<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915150526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AEDBEDD37');
        $this->addSql('DROP INDEX IDX_5387574AEDBEDD37 ON events');
        $this->addSql('ALTER TABLE events CHANGE timeline_id timelines_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A5F21A6F7 FOREIGN KEY (timelines_id) REFERENCES timelines (id)');
        $this->addSql('CREATE INDEX IDX_5387574A5F21A6F7 ON events (timelines_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A5F21A6F7');
        $this->addSql('DROP INDEX IDX_5387574A5F21A6F7 ON events');
        $this->addSql('ALTER TABLE events CHANGE timelines_id timeline_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AEDBEDD37 FOREIGN KEY (timeline_id) REFERENCES timelines (id)');
        $this->addSql('CREATE INDEX IDX_5387574AEDBEDD37 ON events (timeline_id)');
    }
}
