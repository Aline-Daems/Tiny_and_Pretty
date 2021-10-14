<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211013105854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B49947A4EAE');
        $this->addSql('ALTER TABLE choice_size DROP FOREIGN KEY FK_A25F9B499E8817DB');
        $this->addSql('DROP INDEX IDX_A25F9B49947A4EAE ON choice_size');
        $this->addSql('DROP INDEX IDX_A25F9B499E8817DB ON choice_size');
        $this->addSql('ALTER TABLE choice_size DROP size_name_id, DROP choice_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_size ADD size_name_id INT DEFAULT NULL, ADD choice_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B49947A4EAE FOREIGN KEY (size_name_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE choice_size ADD CONSTRAINT FK_A25F9B499E8817DB FOREIGN KEY (choice_user_id) REFERENCES choice_user (id)');
        $this->addSql('CREATE INDEX IDX_A25F9B49947A4EAE ON choice_size (size_name_id)');
        $this->addSql('CREATE INDEX IDX_A25F9B499E8817DB ON choice_size (choice_user_id)');
    }
}
