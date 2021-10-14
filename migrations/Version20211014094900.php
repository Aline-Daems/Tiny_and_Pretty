<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014094900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_choice_size DROP FOREIGN KEY FK_B9EDE4CF706B6C69');
        $this->addSql('ALTER TABLE user_choice_choice_size DROP FOREIGN KEY FK_B457B042706B6C69');
        $this->addSql('ALTER TABLE choice_color DROP FOREIGN KEY FK_C464A6247ADA1FB5');
        $this->addSql('ALTER TABLE products_color DROP FOREIGN KEY FK_860FB6397ADA1FB5');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49498DA827');
        $this->addSql('ALTER TABLE products_size DROP FOREIGN KEY FK_7BD7EA60498DA827');
        $this->addSql('ALTER TABLE user_choice_choice_size DROP FOREIGN KEY FK_B457B0429966EB35');
        $this->addSql('ALTER TABLE user_choice_order DROP FOREIGN KEY FK_D7D701579966EB35');
        $this->addSql('DROP TABLE choice_color');
        $this->addSql('DROP TABLE choice_size');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE order_choice_size');
        $this->addSql('DROP TABLE products_color');
        $this->addSql('DROP TABLE products_size');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE user_choice');
        $this->addSql('DROP TABLE user_choice_choice_size');
        $this->addSql('DROP TABLE user_choice_order');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_color (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, color_id INT DEFAULT NULL, INDEX IDX_C464A624A76ED395 (user_id), INDEX IDX_C464A6244584665A (product_id), INDEX IDX_C464A6247ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE choice_size (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, size_id INT DEFAULT NULL, INDEX IDX_A25F9B49A76ED395 (user_id), INDEX IDX_A25F9B494584665A (product_id), INDEX IDX_A25F9B49498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE order_choice_size (order_id INT NOT NULL, choice_size_id INT NOT NULL, INDEX IDX_B9EDE4CF8D9F6D38 (order_id), INDEX IDX_B9EDE4CF706B6C69 (choice_size_id), PRIMARY KEY(order_id, choice_size_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_color (products_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_860FB6396C8A81A9 (products_id), INDEX IDX_860FB6397ADA1FB5 (color_id), PRIMARY KEY(products_id, color_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_size (products_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_7BD7EA606C8A81A9 (products_id), INDEX IDX_7BD7EA60498DA827 (size_id), PRIMARY KEY(products_id, size_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_choice (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_choice_choice_size (user_choice_id INT NOT NULL, choice_size_id INT NOT NULL, INDEX IDX_B457B0429966EB35 (user_choice_id), INDEX IDX_B457B042706B6C69 (choice_size_id), PRIMARY KEY(user_choice_id, choice_size_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_choice_order (user_choice_id INT NOT NULL, order_id INT NOT NULL, INDEX IDX_D7D701579966EB35 (user_choice_id), INDEX IDX_D7D701578D9F6D38 (order_id), PRIMARY KEY(user_choice_id, order_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A6244584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A6247ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE choice_color ADD CONSTRAINT FK_C464A624A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B494584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_choice_size ADD CONSTRAINT FK_B9EDE4CF706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_choice_size ADD CONSTRAINT FK_B9EDE4CF8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_color ADD CONSTRAINT FK_860FB6396C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_color ADD CONSTRAINT FK_860FB6397ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_size ADD CONSTRAINT FK_7BD7EA60498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_size ADD CONSTRAINT FK_7BD7EA606C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_choice_choice_size ADD CONSTRAINT FK_B457B042706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_choice_choice_size ADD CONSTRAINT FK_B457B0429966EB35 FOREIGN KEY (user_choice_id) REFERENCES user_choice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_choice_order ADD CONSTRAINT FK_D7D701578D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_choice_order ADD CONSTRAINT FK_D7D701579966EB35 FOREIGN KEY (user_choice_id) REFERENCES user_choice (id) ON DELETE CASCADE');
    }
}
