<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014141118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products_sizes (products_id INT NOT NULL, sizes_id INT NOT NULL, INDEX IDX_56C779B96C8A81A9 (products_id), INDEX IDX_56C779B9423285E6 (sizes_id), PRIMARY KEY(products_id, sizes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_sizes ADD CONSTRAINT FK_56C779B96C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_sizes ADD CONSTRAINT FK_56C779B9423285E6 FOREIGN KEY (sizes_id) REFERENCES sizes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE products_sizes');
    }
}
