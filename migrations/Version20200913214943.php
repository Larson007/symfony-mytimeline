<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200913214943 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF346685F21A6F7');
        $this->addSql('DROP INDEX IDX_3AF346685F21A6F7 ON categories');
        $this->addSql('ALTER TABLE categories DROP timelines_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD timelines_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF346685F21A6F7 FOREIGN KEY (timelines_id) REFERENCES timelines (id)');
        $this->addSql('CREATE INDEX IDX_3AF346685F21A6F7 ON categories (timelines_id)');
    }
}
