<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008123603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_color (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, color_id INT DEFAULT NULL, INDEX IDX_C464A6244584665A (product_id), INDEX IDX_C464A624A76ED395 (user_id), INDEX IDX_C464A6247ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_color (products_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_860FB6396C8A81A9 (products_id), INDEX IDX_860FB6397ADA1FB5 (color_id), PRIMARY KEY(products_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A6244584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A624A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A6247ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE products_color ADD CONSTRAINT FK_860FB6396C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_color ADD CONSTRAINT FK_860FB6397ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products ADD is_collection TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_color DROP FOREIGN KEY FK_C464A6247ADA1FB5');
        $this->addSql('ALTER TABLE products_color DROP FOREIGN KEY FK_860FB6397ADA1FB5');
        $this->addSql('DROP TABLE choice_color');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE products_color');
        $this->addSql('ALTER TABLE products DROP is_collection');
    }
}
