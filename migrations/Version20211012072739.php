<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012072739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_details_choice_size (order_details_id INT NOT NULL, choice_size_id INT NOT NULL, INDEX IDX_66389C48C0FA77 (order_details_id), INDEX IDX_66389C4706B6C69 (choice_size_id), PRIMARY KEY(order_details_id, choice_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_details_choice_size ADD CONSTRAINT FK_66389C48C0FA77 FOREIGN KEY (order_details_id) REFERENCES order_details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_details_choice_size ADD CONSTRAINT FK_66389C4706B6C69 FOREIGN KEY (choice_size_id) REFERENCES choice_size (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE order_details_choice_size');
    }
}
