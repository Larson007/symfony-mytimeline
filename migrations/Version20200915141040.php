<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915141040 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A5F21A6F7');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AEDBEDD37');
        $this->addSql('DROP INDEX IDX_5387574A5F21A6F7 ON events');
        $this->addSql('DROP INDEX IDX_5387574AEDBEDD37 ON events');
        $this->addSql('ALTER TABLE events ADD events_id INT DEFAULT NULL, DROP timeline_id, DROP timelines_id');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A9D6A1065 FOREIGN KEY (events_id) REFERENCES timelines (id)');
        $this->addSql('CREATE INDEX IDX_5387574A9D6A1065 ON events (events_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A9D6A1065');
        $this->addSql('DROP INDEX IDX_5387574A9D6A1065 ON events');
        $this->addSql('ALTER TABLE events ADD timelines_id INT DEFAULT NULL, CHANGE events_id timeline_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A5F21A6F7 FOREIGN KEY (timelines_id) REFERENCES timelines (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AEDBEDD37 FOREIGN KEY (timeline_id) REFERENCES timelines (id)');
        $this->addSql('CREATE INDEX IDX_5387574A5F21A6F7 ON events (timelines_id)');
        $this->addSql('CREATE INDEX IDX_5387574AEDBEDD37 ON events (timeline_id)');
    }
}
