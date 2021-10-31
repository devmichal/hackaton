<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029071245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create table files and ralation to users';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE files (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', users_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_635405967B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_635405967B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE account DROP INDEX UNIQ_7D3656A467B3B43D, ADD INDEX IDX_7D3656A467B3B43D (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE files');
        $this->addSql('ALTER TABLE account DROP INDEX IDX_7D3656A467B3B43D, ADD UNIQUE INDEX UNIQ_7D3656A467B3B43D (users_id)');
    }
}
