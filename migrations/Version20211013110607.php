<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211013110607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49BFCDF877');
        $this->addSql('DROP INDEX IDX_A25F9B49BFCDF877 ON choice_size');
        $this->addSql('ALTER TABLE choice_size DROP my_order_id');
        $this->addSql('ALTER TABLE `order` ADD choice_size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id)');
        $this->addSql('CREATE INDEX IDX_F5299398706B6C69 ON `order` (choice_size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size ADD my_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49BFCDF877 FOREIGN KEY (my_order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B49BFCDF877 ON choice_size (my_order_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398706B6C69');
        $this->addSql('DROP INDEX IDX_F5299398706B6C69 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP choice_size_id');
    }
}
