<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240531095501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_content (id INT AUTO_INCREMENT NOT NULL, sub_menu_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, INDEX IDX_761E2D17B30FB5E6 (sub_menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_content ADD CONSTRAINT FK_761E2D17B30FB5E6 FOREIGN KEY (sub_menu_id) REFERENCES submenu (id)');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1487B541DD');
        $this->addSql('ALTER TABLE paragraph DROP FOREIGN KEY FK_7DD3986226ED0855');
        $this->addSql('DROP TABLE categoryss');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE paragraph');
        $this->addSql('DROP TABLE tr');
        $this->addSql('DROP INDEX IDX_A4B0481812469DE2 ON submenu');
        $this->addSql('ALTER TABLE submenu ADD menu_id INT NOT NULL, CHANGE category_id parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE submenu ADD CONSTRAINT FK_A4B04818CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE submenu ADD CONSTRAINT FK_A4B04818727ACA70 FOREIGN KEY (parent_id) REFERENCES submenu (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_A4B04818CCD7E912 ON submenu (menu_id)');
        $this->addSql('CREATE INDEX IDX_A4B04818727ACA70 ON submenu (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE submenu DROP FOREIGN KEY FK_A4B04818CCD7E912');
        $this->addSql('CREATE TABLE categoryss (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, submenu_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_CFBDFA1487B541DD (submenu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE paragraph (id INT AUTO_INCREMENT NOT NULL, note_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, content LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_7DD3986226ED0855 (note_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tr (id INT AUTO_INCREMENT NOT NULL, nz VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1487B541DD FOREIGN KEY (submenu_id) REFERENCES submenu (id)');
        $this->addSql('ALTER TABLE paragraph ADD CONSTRAINT FK_7DD3986226ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('ALTER TABLE menu_content DROP FOREIGN KEY FK_761E2D17B30FB5E6');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_content');
        $this->addSql('ALTER TABLE submenu DROP FOREIGN KEY FK_A4B04818727ACA70');
        $this->addSql('DROP INDEX IDX_A4B04818CCD7E912 ON submenu');
        $this->addSql('DROP INDEX IDX_A4B04818727ACA70 ON submenu');
        $this->addSql('ALTER TABLE submenu DROP menu_id, CHANGE parent_id category_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_A4B0481812469DE2 ON submenu (category_id)');
    }
}
