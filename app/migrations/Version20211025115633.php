<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025115633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables users and account';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account ADD users_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', ADD transaction VARCHAR(255) NOT NULL, ADD money INT NOT NULL, ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A467B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A467B3B43D ON account (users_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499B6B5FBA');
        $this->addSql('DROP INDEX UNIQ_8D93D6499B6B5FBA ON user');
        $this->addSql('ALTER TABLE user DROP account_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A467B3B43D');
        $this->addSql('DROP INDEX UNIQ_7D3656A467B3B43D ON account');
        $this->addSql('ALTER TABLE account DROP users_id, DROP transaction, DROP money, DROP created_at');
        $this->addSql('ALTER TABLE user ADD account_id CHAR(36) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci` COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499B6B5FBA ON user (account_id)');
    }
}
