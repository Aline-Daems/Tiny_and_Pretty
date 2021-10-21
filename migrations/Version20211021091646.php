<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021091646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_boy DROP FOREIGN KEY FK_BB1C81F260AB1C5A');
        $this->addSql('ALTER TABLE products_maison DROP FOREIGN KEY FK_7F3F3D479D67D8AF');
        $this->addSql('ALTER TABLE products_mode DROP FOREIGN KEY FK_1BDD89A177E5854A');
        $this->addSql('CREATE TABLE baby (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE colors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kids (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_baby (products_id INT NOT NULL, baby_id INT NOT NULL, INDEX IDX_B7B4F346C8A81A9 (products_id), INDEX IDX_B7B4F342E288954 (baby_id), PRIMARY KEY(products_id, baby_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_house (products_id INT NOT NULL, house_id INT NOT NULL, INDEX IDX_878CC74D6C8A81A9 (products_id), INDEX IDX_878CC74D6BB74515 (house_id), PRIMARY KEY(products_id, house_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_kids (products_id INT NOT NULL, kids_id INT NOT NULL, INDEX IDX_CEEF1F9E6C8A81A9 (products_id), INDEX IDX_CEEF1F9EB71E5B2E (kids_id), PRIMARY KEY(products_id, kids_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_colors (products_id INT NOT NULL, colors_id INT NOT NULL, INDEX IDX_448D48B56C8A81A9 (products_id), INDEX IDX_448D48B55C002039 (colors_id), PRIMARY KEY(products_id, colors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_baby ADD CONSTRAINT FK_B7B4F346C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_baby ADD CONSTRAINT FK_B7B4F342E288954 FOREIGN KEY (baby_id) REFERENCES baby (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_house ADD CONSTRAINT FK_878CC74D6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_house ADD CONSTRAINT FK_878CC74D6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_kids ADD CONSTRAINT FK_CEEF1F9E6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_kids ADD CONSTRAINT FK_CEEF1F9EB71E5B2E FOREIGN KEY (kids_id) REFERENCES kids (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_colors ADD CONSTRAINT FK_448D48B56C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_colors ADD CONSTRAINT FK_448D48B55C002039 FOREIGN KEY (colors_id) REFERENCES colors (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE boy');
        $this->addSql('DROP TABLE maison');
        $this->addSql('DROP TABLE mode');
        $this->addSql('DROP TABLE products_boy');
        $this->addSql('DROP TABLE products_maison');
        $this->addSql('DROP TABLE products_mode');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B494584665A');
        $this->addSql('DROP INDEX IDX_A25F9B494584665A ON choice_size');
        $this->addSql('ALTER TABLE choice_size DROP product_id');
        $this->addSql('ALTER TABLE order_details ADD sizes VARCHAR(255) NOT NULL, ADD color VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_baby DROP FOREIGN KEY FK_B7B4F342E288954');
        $this->addSql('ALTER TABLE products_colors DROP FOREIGN KEY FK_448D48B55C002039');
        $this->addSql('ALTER TABLE products_house DROP FOREIGN KEY FK_878CC74D6BB74515');
        $this->addSql('ALTER TABLE products_kids DROP FOREIGN KEY FK_CEEF1F9EB71E5B2E');
        $this->addSql('CREATE TABLE boy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE maison (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mode (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_boy (products_id INT NOT NULL, boy_id INT NOT NULL, INDEX IDX_BB1C81F26C8A81A9 (products_id), INDEX IDX_BB1C81F260AB1C5A (boy_id), PRIMARY KEY(products_id, boy_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_maison (products_id INT NOT NULL, maison_id INT NOT NULL, INDEX IDX_7F3F3D476C8A81A9 (products_id), INDEX IDX_7F3F3D479D67D8AF (maison_id), PRIMARY KEY(products_id, maison_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_mode (products_id INT NOT NULL, mode_id INT NOT NULL, INDEX IDX_1BDD89A16C8A81A9 (products_id), INDEX IDX_1BDD89A177E5854A (mode_id), PRIMARY KEY(products_id, mode_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE products_boy ADD CONSTRAINT FK_BB1C81F260AB1C5A FOREIGN KEY (boy_id) REFERENCES boy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_boy ADD CONSTRAINT FK_BB1C81F26C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_maison ADD CONSTRAINT FK_7F3F3D476C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_maison ADD CONSTRAINT FK_7F3F3D479D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_mode ADD CONSTRAINT FK_1BDD89A16C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_mode ADD CONSTRAINT FK_1BDD89A177E5854A FOREIGN KEY (mode_id) REFERENCES mode (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE baby');
        $this->addSql('DROP TABLE colors');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE kids');
        $this->addSql('DROP TABLE products_baby');
        $this->addSql('DROP TABLE products_house');
        $this->addSql('DROP TABLE products_kids');
        $this->addSql('DROP TABLE products_colors');
        $this->addSql('ALTER TABLE choice_size ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B494584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B494584665A ON choice_size (product_id)');
        $this->addSql('ALTER TABLE order_details DROP sizes, DROP color');
    }
}
