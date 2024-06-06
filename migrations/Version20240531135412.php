<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240531135412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_content DROP FOREIGN KEY FK_761E2D17B30FB5E6');
        $this->addSql('DROP INDEX IDX_761E2D17B30FB5E6 ON menu_content');
        $this->addSql('ALTER TABLE menu_content CHANGE sub_menu_id submenu_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu_content ADD CONSTRAINT FK_761E2D1787B541DD FOREIGN KEY (submenu_id) REFERENCES submenu (id)');
        $this->addSql('CREATE INDEX IDX_761E2D1787B541DD ON menu_content (submenu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_content DROP FOREIGN KEY FK_761E2D1787B541DD');
        $this->addSql('DROP INDEX IDX_761E2D1787B541DD ON menu_content');
        $this->addSql('ALTER TABLE menu_content CHANGE submenu_id sub_menu_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu_content ADD CONSTRAINT FK_761E2D17B30FB5E6 FOREIGN KEY (sub_menu_id) REFERENCES submenu (id)');
        $this->addSql('CREATE INDEX IDX_761E2D17B30FB5E6 ON menu_content (sub_menu_id)');
    }
}
