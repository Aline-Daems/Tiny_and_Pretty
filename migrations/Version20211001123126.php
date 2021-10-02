<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001123126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE size ADD choice_sizes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE size ADD CONSTRAINT FK_F7C0246AD36F0FB5 FOREIGN KEY (choice_sizes_id) REFERENCES choice_size (id)');
        $this->addSql('CREATE INDEX IDX_F7C0246AD36F0FB5 ON size (choice_sizes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE size DROP FOREIGN KEY FK_F7C0246AD36F0FB5');
        $this->addSql('DROP INDEX IDX_F7C0246AD36F0FB5 ON size');
        $this->addSql('ALTER TABLE size DROP choice_sizes_id');
    }
}
