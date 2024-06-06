<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240531125016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE submenu DROP FOREIGN KEY FK_A4B04818CCD7E912');
        $this->addSql('DROP INDEX IDX_A4B04818CCD7E912 ON submenu');
        $this->addSql('ALTER TABLE submenu DROP menu_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE submenu ADD menu_id INT NOT NULL');
        $this->addSql('ALTER TABLE submenu ADD CONSTRAINT FK_A4B04818CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_A4B04818CCD7E912 ON submenu (menu_id)');
    }
}
