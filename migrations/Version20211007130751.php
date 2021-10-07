<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007130751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_color ADD color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A6247ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_C464A6247ADA1FB5 ON choice_color (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_color DROP FOREIGN KEY FK_C464A6247ADA1FB5');
        $this->addSql('DROP INDEX IDX_C464A6247ADA1FB5 ON choice_color');
        $this->addSql('ALTER TABLE choice_color DROP color_id');
    }
}
