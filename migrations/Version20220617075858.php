<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617075858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_comment (id INT AUTO_INCREMENT NOT NULL, item_category_id INT NOT NULL, name VARCHAR(128) NOT NULL, text VARCHAR(512) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_photo DROP FOREIGN KEY FK_3E109FC8126F525E');
        $this->addSql('DROP INDEX IDX_3E109FC8126F525E ON item_photo');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category_comment');
        $this->addSql('ALTER TABLE item_photo ADD CONSTRAINT FK_3E109FC8126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3E109FC8126F525E ON item_photo (item_id)');
    }
}
