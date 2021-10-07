<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007115716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products ADD color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A7ADA1FB5 ON products (color_id)');
        $this->addSql('ALTER TABLE user ADD color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6497ADA1FB5 ON user (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A7ADA1FB5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497ADA1FB5');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP INDEX IDX_B3BA5A5A7ADA1FB5 ON products');
        $this->addSql('ALTER TABLE products DROP color_id');
        $this->addSql('DROP INDEX IDX_8D93D6497ADA1FB5 ON user');
        $this->addSql('ALTER TABLE user DROP color_id');
    }
}
