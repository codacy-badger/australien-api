<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816135711 extends AbstractMigration
{
    /**
     * Add columns in color table.
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

        $this->addSql('ALTER TABLE relation.tr_color ADD black BOOLEAN DEFAULT \'false\' NOT NULL');
        $this->addSql('ALTER TABLE relation.tr_color ADD red BOOLEAN DEFAULT \'false\' NOT NULL');
        $this->addSql('ALTER TABLE relation.tr_color ALTER merle SET DEFAULT \'false\'');
        $this->addSql('CREATE UNIQUE INDEX uk_color ON relation.tr_color (merle, black, red)');
        $this->addSql('CREATE UNIQUE INDEX uk_color_identifier ON relation.tr_color (identifier)');
    }

    /**
     * Remove columns from color table.
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

        $this->addSql('DROP INDEX uk_color');
        $this->addSql('DROP INDEX uk_color_identifier');
        $this->addSql('ALTER TABLE relation.tr_color DROP black');
        $this->addSql('ALTER TABLE relation.tr_color DROP red');
        $this->addSql('ALTER TABLE relation.tr_color ALTER merle DROP DEFAULT');
    }
}
