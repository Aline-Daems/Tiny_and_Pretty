<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014083017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_boy DROP FOREIGN KEY FK_BB1C81F260AB1C5A');
        $this->addSql('CREATE TABLE kids (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_kids (products_id INT NOT NULL, kids_id INT NOT NULL, INDEX IDX_CEEF1F9E6C8A81A9 (products_id), INDEX IDX_CEEF1F9EB71E5B2E (kids_id), PRIMARY KEY(products_id, kids_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_kids ADD CONSTRAINT FK_CEEF1F9E6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_kids ADD CONSTRAINT FK_CEEF1F9EB71E5B2E FOREIGN KEY (kids_id) REFERENCES kids (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE boy');
        $this->addSql('DROP TABLE products_boy');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_kids DROP FOREIGN KEY FK_CEEF1F9EB71E5B2E');
        $this->addSql('CREATE TABLE boy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_boy (products_id INT NOT NULL, boy_id INT NOT NULL, INDEX IDX_BB1C81F26C8A81A9 (products_id), INDEX IDX_BB1C81F260AB1C5A (boy_id), PRIMARY KEY(products_id, boy_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE products_boy ADD CONSTRAINT FK_BB1C81F260AB1C5A FOREIGN KEY (boy_id) REFERENCES boy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_boy ADD CONSTRAINT FK_BB1C81F26C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE kids');
        $this->addSql('DROP TABLE products_kids');
    }
}
