<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007073204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49947A4EAE');
        $this->addSql('DROP INDEX IDX_A25F9B49947A4EAE ON choice_size');
        $this->addSql('ALTER TABLE choice_size ADD size_name VARCHAR(255) NOT NULL, DROP size_name_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size ADD size_name_id INT DEFAULT NULL, DROP size_name');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49947A4EAE FOREIGN KEY (size_name_id) REFERENCES size (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B49947A4EAE ON choice_size (size_name_id)');
    }
}
