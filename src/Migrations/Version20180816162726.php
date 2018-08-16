<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816162726 extends AbstractMigration
{
    /**
     * Country file to load.
     *
     * @var string
     */
    private $countryCSV;

    /**
     * City file to load.
     *
     * @var string
     */
    private $cityCSV;

    /**
     * Load the country csv file into a tmp directory.
     *
     * @param Schema $schema
     */
    public function preUp(Schema $schema)
    {
        parent::preUp($schema);

        //TODO use getenv to get good subdirectory
        //LOADING DATA
        $countryFile = __DIR__.'/../Resources/data/country.csv';
        $cityFile = __DIR__.'/../Resources/data/cities.csv';

        //DIRECTORY
        $directory = getenv('LOAD_DIRECTORY');
        if (false === $directory) {
            $directory = sys_get_temp_dir();
        }
        $this->countryCSV = $directory.DIRECTORY_SEPARATOR.'country.csv';
        $this->cityCSV = $directory.DIRECTORY_SEPARATOR.'cities.csv';

        //Files copy
        if ('1' === getenv('COPY_FILES')) {
            $this->write('Copying data files into directory: '.$directory);
            copy($countryFile, $this->countryCSV);
            copy($cityFile, $this->cityCSV);
            $this->write('Files copied');
        }
    }

    /**
     * Delete the country csv file.
     *
     * @param Schema $schema
     */
    public function postUp(Schema $schema)
    {
        parent::postUp($schema);
        if (1 === getenv('COPY_FILES')) {
            $this->write('Deleting data files.');
            unlink($this->countryCSV);
            unlink($this->cityCSV);
        }
    }

    /**
     * Database initial setup.
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

        $this->addSql('CREATE SCHEMA data');
        $this->addSql('CREATE SCHEMA relation');
        $this->addSql('CREATE SEQUENCE data.te_address_address_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE relation.tr_color_color_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data.te_dog_dog_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE relation.tr_health_health_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data.te_kennel_kennel_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE relation.tr_locality_locality_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data.te_owner_usr_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE data.te_address (address_id INT NOT NULL, locality_id INT DEFAULT NULL, region TEXT DEFAULT NULL, post_office_box_number TEXT DEFAULT NULL, postal_code TEXT DEFAULT NULL, street_address TEXT DEFAULT NULL, ad_geometry Geometry DEFAULT NULL, PRIMARY KEY(address_id))');
        $this->addSql('CREATE INDEX idx_address_locality ON data.te_address (locality_id)');
        $this->addSql('COMMENT ON COLUMN data.te_address.ad_geometry IS \'(DC2Type:geometry)\'');
        $this->addSql('CREATE TABLE data.tj_checkup (health_id INT NOT NULL, dog_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(health_id, dog_id))');
        $this->addSql('CREATE INDEX idx_checkup_health ON data.tj_checkup (health_id)');
        $this->addSql('CREATE INDEX idx_checkup_dog ON data.tj_checkup (dog_id)');
        $this->addSql('CREATE TABLE relation.tr_color (color_id INT NOT NULL, name VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, merle BOOLEAN DEFAULT \'false\' NOT NULL, black BOOLEAN DEFAULT \'false\' NOT NULL, red BOOLEAN DEFAULT \'false\' NOT NULL, PRIMARY KEY(color_id))');
        $this->addSql('CREATE UNIQUE INDEX uk_color ON relation.tr_color (merle, black, red)');
        $this->addSql('CREATE UNIQUE INDEX uk_color_identifier ON relation.tr_color (identifier)');
        $this->addSql('CREATE TABLE relation.tr_country (code VARCHAR(2) NOT NULL, name VARCHAR(100) NOT NULL, co_geom Geometry DEFAULT NULL, PRIMARY KEY(code))');
        $this->addSql('CREATE INDEX idx_country_code ON relation.tr_country (code)');
        $this->addSql('COMMENT ON COLUMN relation.tr_country.co_geom IS \'(DC2Type:geometry)\'');
        $this->addSql('CREATE TABLE data.te_dog (dog_id INT NOT NULL, kennel_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, father_id INT DEFAULT NULL, mother_id INT DEFAULT NULL, color_id INT NOT NULL, birthday DATE DEFAULT NULL, breeder TEXT DEFAULT NULL, deathday DATE DEFAULT NULL, name VARCHAR(255) NOT NULL, pedigree_number VARCHAR(32) DEFAULT NULL, sex BOOLEAN DEFAULT NULL, sterilized BOOLEAN DEFAULT \'false\' NOT NULL, tatoo VARCHAR(16) DEFAULT NULL, dog_tail INT NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(dog_id))');
        $this->addSql('CREATE INDEX idx_dog_color ON data.te_dog (color_id)');
        $this->addSql('CREATE INDEX idx_dog_father ON data.te_dog (father_id)');
        $this->addSql('CREATE INDEX idx_dog_mother ON data.te_dog (mother_id)');
        $this->addSql('CREATE INDEX idx_dog_kennel ON data.te_dog (kennel_id)');
        $this->addSql('CREATE INDEX idx_dog_owner ON data.te_dog (owner_id)');
        $this->addSql('CREATE UNIQUE INDEX uk_dog_uuid ON data.te_dog (uuid)');
        $this->addSql('CREATE TABLE relation.tr_health (health_id INT NOT NULL, identifier VARCHAR(255) NOT NULL, maximum INT NOT NULL, PRIMARY KEY(health_id))');
        $this->addSql('CREATE UNIQUE INDEX uk_health_identifier ON relation.tr_health (identifier)');
        $this->addSql('CREATE TABLE data.te_kennel (kennel_id INT NOT NULL, address_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, legal_name TEXT NOT NULL, PRIMARY KEY(kennel_id))');
        $this->addSql('CREATE INDEX idx_kennel_owner ON data.te_kennel (owner_id)');
        $this->addSql('CREATE UNIQUE INDEX uk_kennel_address ON data.te_kennel (address_id)');
        $this->addSql('CREATE TABLE relation.tr_locality (locality_id INT NOT NULL, country_id VARCHAR(2) DEFAULT NULL, name VARCHAR(200) NOT NULL, lo_geometry Geometry DEFAULT NULL, PRIMARY KEY(locality_id))');
        $this->addSql('CREATE INDEX idx_locality_country ON relation.tr_locality (country_id)');
        $this->addSql('COMMENT ON COLUMN relation.tr_locality.lo_geometry IS \'(DC2Type:geometry)\'');
        $this->addSql('CREATE TABLE data.te_owner (usr_id INT NOT NULL, address_id INT DEFAULT NULL, usr_additional_name TEXT DEFAULT NULL, usr_email TEXT NOT NULL, usr_family_name TEXT DEFAULT NULL, usr_given_name TEXT DEFAULT NULL, age_job_title TEXT DEFAULT NULL, usr_name TEXT DEFAULT NULL, usr_password TEXT DEFAULT NULL, usr_active BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(usr_id))');
        $this->addSql('CREATE UNIQUE INDEX uk_usr_email ON data.te_owner (usr_email)');
        $this->addSql('CREATE UNIQUE INDEX uk_person_address ON data.te_owner (address_id)');
        $this->addSql('ALTER TABLE data.te_address ADD CONSTRAINT FK_ADDRESS_LOCALITY FOREIGN KEY (locality_id) REFERENCES relation.tr_locality (locality_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.tj_checkup ADD CONSTRAINT FK_CHECKUP_HEALTH FOREIGN KEY (health_id) REFERENCES relation.tr_health (health_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.tj_checkup ADD CONSTRAINT FK_CHECKUP_DOG FOREIGN KEY (dog_id) REFERENCES data.te_dog (dog_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_DOG_KENNEL FOREIGN KEY (kennel_id) REFERENCES data.te_kennel (kennel_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_DOG_OWNER FOREIGN KEY (owner_id) REFERENCES data.te_owner (usr_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_DOG_FATHER FOREIGN KEY (father_id) REFERENCES data.te_dog (dog_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_DOG_MOTHER FOREIGN KEY (mother_id) REFERENCES data.te_dog (dog_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_DOG_COLOR FOREIGN KEY (color_id) REFERENCES relation.tr_color (color_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_kennel ADD CONSTRAINT FK_KENNEL_ADDRESS FOREIGN KEY (address_id) REFERENCES data.te_address (address_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_kennel ADD CONSTRAINT FK_KENNEL_OWNER FOREIGN KEY (owner_id) REFERENCES data.te_owner (usr_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE relation.tr_locality ADD CONSTRAINT FK_LOCALITY_COUNTRY FOREIGN KEY (country_id) REFERENCES relation.tr_country (code) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_owner ADD CONSTRAINT FK_OWNER_ADDRESS FOREIGN KEY (address_id) REFERENCES data.te_address (address_id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addsql("COPY relation.tr_country (code, name) FROM '{$this->countryCSV}' WITH (FORMAT CSV)");
        $this->addsql('CREATE TABLE relation.tr_city (country VARCHAR(2) DEFAULT NULL, 	code VARCHAR(200) DEFAULT NULL, name VARCHAR(200) DEFAULT NULL, region varchar(3) DEFAULT NULL,	population varchar(9) DEFAULT NULL, latitude double precision DEFAULT NULL, longitude double precision DEFAULT NULL)');
        $this->addsql("COPY relation.tr_city (country, code, name, region, population, latitude, longitude) FROM '{$this->cityCSV}' WITH (FORMAT CSV)");
        $this->addsql("INSERT INTO relation.tr_locality (locality_id, country_id, name, lo_geometry) SELECT nextval('relation.tr_locality_locality_id_seq'), upper(country), name, st_point(latitude, longitude) FROM relation.tr_city");
        $this->addsql('DROP TABLE relation.tr_city');
    }

    /**
     * Database.
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

        $this->addSql('ALTER TABLE data.te_kennel DROP CONSTRAINT FK_KENNEL_ADDRESS');
        $this->addSql('ALTER TABLE data.te_owner DROP CONSTRAINT FK_OWNER_ADDRESS');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_DOG_KENNEL');
        $this->addSql('ALTER TABLE relation.tr_locality DROP CONSTRAINT FK_LOCALITY_COUNTRY');
        $this->addSql('ALTER TABLE data.tj_checkup DROP CONSTRAINT FK_CHECKUP_DOG');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_DOG_OWNER');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_DOG_MOTHER');
        $this->addSql('ALTER TABLE data.tj_checkup DROP CONSTRAINT FK_CHECKUP_HEALTH');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_DOG_FATHER');
        $this->addSql('ALTER TABLE data.te_address DROP CONSTRAINT FK_ADDRESS_LOCALITY');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_DOG_COLOR');
        $this->addSql('ALTER TABLE data.te_kennel DROP CONSTRAINT FK_KENNEL_OWNER');
        $this->addSql('DROP SEQUENCE data.te_address_address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE relation.tr_color_color_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data.te_dog_dog_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE relation.tr_health_health_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data.te_kennel_kennel_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE relation.tr_locality_locality_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data.te_owner_usr_id_seq CASCADE');
        $this->addSql('DROP TABLE data.te_address');
        $this->addSql('DROP TABLE data.tj_checkup');
        $this->addSql('DROP TABLE relation.tr_color');
        $this->addSql('DROP TABLE relation.tr_country');
        $this->addSql('DROP TABLE data.te_dog');
        $this->addSql('DROP TABLE relation.tr_health');
        $this->addSql('DROP TABLE data.te_kennel');
        $this->addSql('DROP TABLE relation.tr_locality');
        $this->addSql('DROP TABLE data.te_owner');
        $this->addSql('DROP SCHEMA data');
        $this->addSql('DROP SCHEMA relation');
    }
}
