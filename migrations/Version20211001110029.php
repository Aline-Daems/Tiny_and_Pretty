<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001110029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_size_size (choice_size_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_6E96BF0A706B6C69 (choice_size_id), INDEX IDX_6E96BF0A498DA827 (size_id), PRIMARY KEY(choice_size_id, size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice_size_size ADD CONSTRAINT FK_6E96BF0A706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE choice_size_size ADD CONSTRAINT FK_6E96BF0A498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49498DA827');
        $this->addSql('DROP INDEX IDX_A25F9B49498DA827 ON choice_size');
        $this->addSql('ALTER TABLE choice_size DROP size_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE choice_size_size');
        $this->addSql('ALTER TABLE choice_size ADD size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B49498DA827 ON choice_size (size_id)');
    }
}
