<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014083215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_maison DROP FOREIGN KEY FK_7F3F3D479D67D8AF');
        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_house (products_id INT NOT NULL, house_id INT NOT NULL, INDEX IDX_878CC74D6C8A81A9 (products_id), INDEX IDX_878CC74D6BB74515 (house_id), PRIMARY KEY(products_id, house_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_house ADD CONSTRAINT FK_878CC74D6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_house ADD CONSTRAINT FK_878CC74D6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE maison');
        $this->addSql('DROP TABLE products_maison');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_house DROP FOREIGN KEY FK_878CC74D6BB74515');
        $this->addSql('CREATE TABLE maison (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_maison (products_id INT NOT NULL, maison_id INT NOT NULL, INDEX IDX_7F3F3D476C8A81A9 (products_id), INDEX IDX_7F3F3D479D67D8AF (maison_id), PRIMARY KEY(products_id, maison_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE products_maison ADD CONSTRAINT FK_7F3F3D476C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_maison ADD CONSTRAINT FK_7F3F3D479D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE products_house');
    }
}
