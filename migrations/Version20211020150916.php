<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211020150916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products_colors (products_id INT NOT NULL, colors_id INT NOT NULL, INDEX IDX_448D48B56C8A81A9 (products_id), INDEX IDX_448D48B55C002039 (colors_id), PRIMARY KEY(products_id, colors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_colors ADD CONSTRAINT FK_448D48B56C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_colors ADD CONSTRAINT FK_448D48B55C002039 FOREIGN KEY (colors_id) REFERENCES colors (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE colors_products');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colors_products (colors_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_501559435C002039 (colors_id), INDEX IDX_501559436C8A81A9 (products_id), PRIMARY KEY(colors_id, products_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE colors_products ADD CONSTRAINT FK_501559435C002039 FOREIGN KEY (colors_id) REFERENCES colors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE colors_products ADD CONSTRAINT FK_501559436C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE products_colors');
    }
}
