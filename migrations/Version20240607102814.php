<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240607102814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dashboard (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu ADD dashboard_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93B9D04D2B ON menu (dashboard_id)');
        $this->addSql('ALTER TABLE submenu ADD dashboard_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE submenu ADD CONSTRAINT FK_A4B04818B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id)');
        $this->addSql('CREATE INDEX IDX_A4B04818B9D04D2B ON submenu (dashboard_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B9D04D2B');
        $this->addSql('ALTER TABLE submenu DROP FOREIGN KEY FK_A4B04818B9D04D2B');
        $this->addSql('DROP TABLE dashboard');
        $this->addSql('DROP INDEX IDX_7D053A93B9D04D2B ON menu');
        $this->addSql('ALTER TABLE menu DROP dashboard_id');
        $this->addSql('DROP INDEX IDX_A4B04818B9D04D2B ON submenu');
        $this->addSql('ALTER TABLE submenu DROP dashboard_id');
    }
}
