<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617080407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_comment ADD CONSTRAINT FK_53AC1212F22EC5D4 FOREIGN KEY (item_category_id) REFERENCES item_category (id)');
        $this->addSql('CREATE INDEX IDX_53AC1212F22EC5D4 ON category_comment (item_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_comment DROP FOREIGN KEY FK_53AC1212F22EC5D4');
        $this->addSql('DROP INDEX IDX_53AC1212F22EC5D4 ON category_comment');
    }
}
