<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211013101550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_user (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, product VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice_size ADD choice_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B499E8817DB FOREIGN KEY (choice_user_id) REFERENCES choice_user (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B499E8817DB ON choice_size (choice_user_id)');
        $this->addSql('ALTER TABLE `order` ADD choice_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989E8817DB FOREIGN KEY (choice_user_id) REFERENCES choice_user (id)');
        $this->addSql('CREATE INDEX IDX_F52993989E8817DB ON `order` (choice_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B499E8817DB');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989E8817DB');
        $this->addSql('DROP TABLE choice_user');
        $this->addSql('DROP INDEX IDX_A25F9B499E8817DB ON choice_size');
        $this->addSql('ALTER TABLE choice_size DROP choice_user_id');
        $this->addSql('DROP INDEX IDX_F52993989E8817DB ON `order`');
        $this->addSql('ALTER TABLE `order` DROP choice_user_id');
    }
}
