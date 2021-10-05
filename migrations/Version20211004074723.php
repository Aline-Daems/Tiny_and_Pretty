<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004074723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accessory (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, postal VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choice_size (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, size_id INT DEFAULT NULL, INDEX IDX_A25F9B494584665A (product_id), INDEX IDX_A25F9B49A76ED395 (user_id), INDEX IDX_A25F9B49498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_partner (id INT AUTO_INCREMENT NOT NULL, who VARCHAR(255) NOT NULL, iam VARCHAR(255) NOT NULL, tva INT DEFAULT NULL, email VARCHAR(255) NOT NULL, siteweb VARCHAR(255) DEFAULT NULL, tel INT NOT NULL, adress VARCHAR(255) NOT NULL, work VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filter (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maison (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, carrier_name VARCHAR(255) NOT NULL, carrier_price DOUBLE PRECISION NOT NULL, delivery LONGTEXT NOT NULL, reference VARCHAR(255) NOT NULL, stripe_session_id VARCHAR(255) DEFAULT NULL, state INT NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, my_order_id INT NOT NULL, product VARCHAR(255) NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, total DOUBLE PRECISION NOT NULL, INDEX IDX_845CA2C1BFCDF877 (my_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, products_id INT NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_16DB4F896C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, is_best TINYINT(1) NOT NULL, soldout TINYINT(1) NOT NULL, is_new TINYINT(1) NOT NULL, top_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_category (products_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_134D09726C8A81A9 (products_id), INDEX IDX_134D097212469DE2 (category_id), PRIMARY KEY(products_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_mode (products_id INT NOT NULL, mode_id INT NOT NULL, INDEX IDX_1BDD89A16C8A81A9 (products_id), INDEX IDX_1BDD89A177E5854A (mode_id), PRIMARY KEY(products_id, mode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_maison (products_id INT NOT NULL, maison_id INT NOT NULL, INDEX IDX_7F3F3D476C8A81A9 (products_id), INDEX IDX_7F3F3D479D67D8AF (maison_id), PRIMARY KEY(products_id, maison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_boy (products_id INT NOT NULL, boy_id INT NOT NULL, INDEX IDX_BB1C81F26C8A81A9 (products_id), INDEX IDX_BB1C81F260AB1C5A (boy_id), PRIMARY KEY(products_id, boy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_toys (products_id INT NOT NULL, toys_id INT NOT NULL, INDEX IDX_3D7448F96C8A81A9 (products_id), INDEX IDX_3D7448F968A10727 (toys_id), PRIMARY KEY(products_id, toys_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_accessory (products_id INT NOT NULL, accessory_id INT NOT NULL, INDEX IDX_F3CCC63A6C8A81A9 (products_id), INDEX IDX_F3CCC63A27E8CC78 (accessory_id), PRIMARY KEY(products_id, accessory_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_user (products_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_18418436C8A81A9 (products_id), INDEX IDX_1841843A76ED395 (user_id), PRIMARY KEY(products_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_size (products_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_7BD7EA606C8A81A9 (products_id), INDEX IDX_7BD7EA60498DA827 (size_id), PRIMARY KEY(products_id, size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B9983CE5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE top_image (id INT AUTO_INCREMENT NOT NULL, products_id INT NOT NULL, top_image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5022AD2B6C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE toys (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wish (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_D7D174C94584665A (product_id), INDEX IDX_D7D174C9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B494584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1BFCDF877 FOREIGN KEY (my_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F896C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE products_category ADD CONSTRAINT FK_134D09726C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_category ADD CONSTRAINT FK_134D097212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_mode ADD CONSTRAINT FK_1BDD89A16C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_mode ADD CONSTRAINT FK_1BDD89A177E5854A FOREIGN KEY (mode_id) REFERENCES mode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_maison ADD CONSTRAINT FK_7F3F3D476C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_maison ADD CONSTRAINT FK_7F3F3D479D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_boy ADD CONSTRAINT FK_BB1C81F26C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_boy ADD CONSTRAINT FK_BB1C81F260AB1C5A FOREIGN KEY (boy_id) REFERENCES boy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_toys ADD CONSTRAINT FK_3D7448F96C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_toys ADD CONSTRAINT FK_3D7448F968A10727 FOREIGN KEY (toys_id) REFERENCES toys (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_accessory ADD CONSTRAINT FK_F3CCC63A6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_accessory ADD CONSTRAINT FK_F3CCC63A27E8CC78 FOREIGN KEY (accessory_id) REFERENCES accessory (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_user ADD CONSTRAINT FK_18418436C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_user ADD CONSTRAINT FK_1841843A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_size ADD CONSTRAINT FK_7BD7EA606C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_size ADD CONSTRAINT FK_7BD7EA60498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reset_password ADD CONSTRAINT FK_B9983CE5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE top_image ADD CONSTRAINT FK_5022AD2B6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C94584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_accessory DROP FOREIGN KEY FK_F3CCC63A27E8CC78');
        $this->addSql('ALTER TABLE products_boy DROP FOREIGN KEY FK_BB1C81F260AB1C5A');
        $this->addSql('ALTER TABLE products_category DROP FOREIGN KEY FK_134D097212469DE2');
        $this->addSql('ALTER TABLE products_maison DROP FOREIGN KEY FK_7F3F3D479D67D8AF');
        $this->addSql('ALTER TABLE products_mode DROP FOREIGN KEY FK_1BDD89A177E5854A');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C1BFCDF877');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B494584665A');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F896C8A81A9');
        $this->addSql('ALTER TABLE products_category DROP FOREIGN KEY FK_134D09726C8A81A9');
        $this->addSql('ALTER TABLE products_mode DROP FOREIGN KEY FK_1BDD89A16C8A81A9');
        $this->addSql('ALTER TABLE products_maison DROP FOREIGN KEY FK_7F3F3D476C8A81A9');
        $this->addSql('ALTER TABLE products_boy DROP FOREIGN KEY FK_BB1C81F26C8A81A9');
        $this->addSql('ALTER TABLE products_toys DROP FOREIGN KEY FK_3D7448F96C8A81A9');
        $this->addSql('ALTER TABLE products_accessory DROP FOREIGN KEY FK_F3CCC63A6C8A81A9');
        $this->addSql('ALTER TABLE products_user DROP FOREIGN KEY FK_18418436C8A81A9');
        $this->addSql('ALTER TABLE products_size DROP FOREIGN KEY FK_7BD7EA606C8A81A9');
        $this->addSql('ALTER TABLE top_image DROP FOREIGN KEY FK_5022AD2B6C8A81A9');
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C94584665A');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49498DA827');
        $this->addSql('ALTER TABLE products_size DROP FOREIGN KEY FK_7BD7EA60498DA827');
        $this->addSql('ALTER TABLE products_toys DROP FOREIGN KEY FK_3D7448F968A10727');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49A76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE products_user DROP FOREIGN KEY FK_1841843A76ED395');
        $this->addSql('ALTER TABLE reset_password DROP FOREIGN KEY FK_B9983CE5A76ED395');
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C9A76ED395');
        $this->addSql('DROP TABLE accessory');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE boy');
        $this->addSql('DROP TABLE carrier');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE choice_size');
        $this->addSql('DROP TABLE contact_partner');
        $this->addSql('DROP TABLE contact_user');
        $this->addSql('DROP TABLE filter');
        $this->addSql('DROP TABLE maison');
        $this->addSql('DROP TABLE mode');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE products_category');
        $this->addSql('DROP TABLE products_mode');
        $this->addSql('DROP TABLE products_maison');
        $this->addSql('DROP TABLE products_boy');
        $this->addSql('DROP TABLE products_toys');
        $this->addSql('DROP TABLE products_accessory');
        $this->addSql('DROP TABLE products_user');
        $this->addSql('DROP TABLE products_size');
        $this->addSql('DROP TABLE reset_password');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE top_image');
        $this->addSql('DROP TABLE toys');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wish');
    }
}
