<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005111347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_details DROP size');
        $this->addSql('ALTER TABLE size DROP FOREIGN KEY FK_57F28B54423285E6');
        $this->addSql('DROP INDEX IDX_57F28B54423285E6 ON size');
        $this->addSql('ALTER TABLE size DROP sizes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_details ADD size VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE size ADD sizes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE size ADD CONSTRAINT FK_57F28B54423285E6 FOREIGN KEY (sizes_id) REFERENCES choice_size (id)');
        $this->addSql('CREATE INDEX IDX_57F28B54423285E6 ON size (sizes_id)');
    }
}
