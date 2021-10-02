<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001080149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_size (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, size_id INT DEFAULT NULL, INDEX IDX_A25F9B49A76ED395 (user_id), INDEX IDX_A25F9B49498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE products ADD choice_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A706B6C69 ON products (choice_size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A706B6C69');
        $this->addSql('DROP TABLE choice_size');
        $this->addSql('DROP INDEX IDX_B3BA5A5A706B6C69 ON products');
        $this->addSql('ALTER TABLE products DROP choice_size_id');
    }
}
