<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025093353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coupond_used (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coupon ADD coupond_used_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F0213B33A96 FOREIGN KEY (coupond_used_id) REFERENCES coupond_used (id)');
        $this->addSql('CREATE INDEX IDX_64BF3F0213B33A96 ON coupon (coupond_used_id)');
        $this->addSql('ALTER TABLE user ADD coupond_used_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64913B33A96 FOREIGN KEY (coupond_used_id) REFERENCES coupond_used (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64913B33A96 ON user (coupond_used_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F0213B33A96');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64913B33A96');
        $this->addSql('DROP TABLE coupond_used');
        $this->addSql('DROP INDEX IDX_64BF3F0213B33A96 ON coupon');
        $this->addSql('ALTER TABLE coupon DROP coupond_used_id');
        $this->addSql('DROP INDEX IDX_8D93D64913B33A96 ON user');
        $this->addSql('ALTER TABLE user DROP coupond_used_id');
    }
}
