<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001080325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B494584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B494584665A ON choice_size (product_id)');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A706B6C69');
        $this->addSql('DROP INDEX IDX_B3BA5A5A706B6C69 ON products');
        $this->addSql('ALTER TABLE products DROP choice_size_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B494584665A');
        $this->addSql('DROP INDEX IDX_A25F9B494584665A ON choice_size');
        $this->addSql('ALTER TABLE choice_size DROP product_id');
        $this->addSql('ALTER TABLE products ADD choice_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A706B6C69 ON products (choice_size_id)');
    }
}
