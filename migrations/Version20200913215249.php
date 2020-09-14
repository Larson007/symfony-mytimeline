<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200913215249 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timelines ADD categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE timelines ADD CONSTRAINT FK_BF99F5A0A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_BF99F5A0A21214B7 ON timelines (categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timelines DROP FOREIGN KEY FK_BF99F5A0A21214B7');
        $this->addSql('DROP INDEX IDX_BF99F5A0A21214B7 ON timelines');
        $this->addSql('ALTER TABLE timelines DROP categories_id');
    }
}
