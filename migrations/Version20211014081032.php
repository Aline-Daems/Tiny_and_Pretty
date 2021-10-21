<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014081032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_mode DROP FOREIGN KEY FK_1BDD89A177E5854A');
        $this->addSql('CREATE TABLE baby (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_baby (products_id INT NOT NULL, baby_id INT NOT NULL, INDEX IDX_B7B4F346C8A81A9 (products_id), INDEX IDX_B7B4F342E288954 (baby_id), PRIMARY KEY(products_id, baby_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_baby ADD CONSTRAINT FK_B7B4F346C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_baby ADD CONSTRAINT FK_B7B4F342E288954 FOREIGN KEY (baby_id) REFERENCES baby (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE mode');
        $this->addSql('DROP TABLE products_mode');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_baby DROP FOREIGN KEY FK_B7B4F342E288954');
        $this->addSql('CREATE TABLE mode (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products_mode (products_id INT NOT NULL, mode_id INT NOT NULL, INDEX IDX_1BDD89A16C8A81A9 (products_id), INDEX IDX_1BDD89A177E5854A (mode_id), PRIMARY KEY(products_id, mode_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE products_mode ADD CONSTRAINT FK_1BDD89A16C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_mode ADD CONSTRAINT FK_1BDD89A177E5854A FOREIGN KEY (mode_id) REFERENCES mode (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE baby');
        $this->addSql('DROP TABLE products_baby');
    }
}
