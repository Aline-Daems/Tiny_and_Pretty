<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012080211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_choice (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_choice_choice_size (user_choice_id INT NOT NULL, choice_size_id INT NOT NULL, INDEX IDX_B457B0429966EB35 (user_choice_id), INDEX IDX_B457B042706B6C69 (choice_size_id), PRIMARY KEY(user_choice_id, choice_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_choice_choice_size ADD CONSTRAINT FK_B457B0429966EB35 FOREIGN KEY (user_choice_id) REFERENCES user_choice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_choice_choice_size ADD CONSTRAINT FK_B457B042706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_choice_choice_size DROP FOREIGN KEY FK_B457B0429966EB35');
        $this->addSql('DROP TABLE user_choice');
        $this->addSql('DROP TABLE user_choice_choice_size');
    }
}
