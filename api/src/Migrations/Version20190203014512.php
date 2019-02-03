<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190203014512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE inter_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE inter_user (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN inter_user.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE inter_group (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE inter_group_inter_user (inter_group_id INT, inter_user_id UUID, PRIMARY KEY(inter_group_id, inter_user_id))');
        $this->addSql('CREATE INDEX IDX_A030877DC5CB829D ON inter_group_inter_user (inter_group_id)');
        $this->addSql('CREATE INDEX IDX_A030877D5615C1B5 ON inter_group_inter_user (inter_user_id)');
        $this->addSql('COMMENT ON COLUMN inter_group_inter_user.inter_user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE inter_group_inter_user ADD CONSTRAINT FK_A030877DC5CB829D FOREIGN KEY (inter_group_id) REFERENCES inter_group (id) ON DELETE RESTRICT NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE inter_group_inter_user ADD CONSTRAINT FK_A030877D5615C1B5 FOREIGN KEY (inter_user_id) REFERENCES inter_user (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE inter_group_inter_user DROP CONSTRAINT FK_A030877D5615C1B5');
        $this->addSql('ALTER TABLE inter_group_inter_user DROP CONSTRAINT FK_A030877DC5CB829D');
        $this->addSql('DROP SEQUENCE inter_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('DROP TABLE inter_user');
        $this->addSql('DROP TABLE inter_group');
        $this->addSql('DROP TABLE inter_group_inter_user');
        $this->addSql('DROP TABLE greeting');
    }
}
