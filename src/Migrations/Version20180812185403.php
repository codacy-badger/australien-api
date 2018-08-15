<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180812185403 extends AbstractMigration
{
    /**
     * Color and tail added.
     *
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE relation.tr_color_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE relation.tr_color (id INT NOT NULL, name VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, merle BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE data.te_dog ADD color_id INT NOT NULL');
        $this->addSql('ALTER TABLE data.te_dog ADD dog_tail INT NOT NULL');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_B74103547ADA1FB5 FOREIGN KEY (color_id) REFERENCES relation.tr_color (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
//        $this->addSql('CREATE INDEX IDX_B74103547ADA1FB5 ON data.te_dog (color_id)');
    }

    /**
     * Color and tail removed.
     *
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_B74103547ADA1FB5');
        $this->addSql('DROP SEQUENCE relation.tr_color_id_seq CASCADE');
        $this->addSql('DROP TABLE relation.tr_color');
//        $this->addSql('DROP INDEX IDX_B74103547ADA1FB5');
        $this->addSql('ALTER TABLE data.te_dog DROP color_id');
        $this->addSql('ALTER TABLE data.te_dog DROP dog_tail');
    }
}
