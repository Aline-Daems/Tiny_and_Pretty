<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012082448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_choice_order (user_choice_id INT NOT NULL, order_id INT NOT NULL, INDEX IDX_D7D701579966EB35 (user_choice_id), INDEX IDX_D7D701578D9F6D38 (order_id), PRIMARY KEY(user_choice_id, order_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_choice_order ADD CONSTRAINT FK_D7D701579966EB35 FOREIGN KEY (user_choice_id) REFERENCES user_choice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_choice_order ADD CONSTRAINT FK_D7D701578D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_choice_order');
    }
}
