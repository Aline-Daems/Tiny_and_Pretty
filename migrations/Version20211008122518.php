<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008122518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_size (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, size_id INT DEFAULT NULL, size_name_id INT DEFAULT NULL, INDEX IDX_A25F9B494584665A (product_id), INDEX IDX_A25F9B49A76ED395 (user_id), INDEX IDX_A25F9B49498DA827 (size_id), INDEX IDX_A25F9B49947A4EAE (size_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_size (products_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_7BD7EA606C8A81A9 (products_id), INDEX IDX_7BD7EA60498DA827 (size_id), PRIMARY KEY(products_id, size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B494584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49947A4EAE FOREIGN KEY (size_name_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE products_size ADD CONSTRAINT FK_7BD7EA606C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_size ADD CONSTRAINT FK_7BD7EA60498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49498DA827');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49947A4EAE');
        $this->addSql('ALTER TABLE products_size DROP FOREIGN KEY FK_7BD7EA60498DA827');
        $this->addSql('DROP TABLE choice_size');
        $this->addSql('DROP TABLE products_size');
        $this->addSql('DROP TABLE size');
    }
}
