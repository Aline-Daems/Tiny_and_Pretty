<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211013105303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989E8817DB');
        $this->addSql('DROP INDEX IDX_F52993989E8817DB ON `order`');
        $this->addSql('ALTER TABLE `order` DROP choice_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD choice_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989E8817DB FOREIGN KEY (choice_user_id) REFERENCES choice_user (id)');
        $this->addSql('CREATE INDEX IDX_F52993989E8817DB ON `order` (choice_user_id)');
    }
}
