<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210910133342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C971179CD6');
        $this->addSql('DROP INDEX UNIQ_D7D174C971179CD6 ON wish');
        $this->addSql('ALTER TABLE wish DROP name_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wish ADD name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C971179CD6 FOREIGN KEY (name_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D7D174C971179CD6 ON wish (name_id)');
    }
}
