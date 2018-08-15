<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180812174306 extends AbstractMigration
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

        //LOADING DATA
        $countryFile = __DIR__ . '/../Resources/data/country.csv';
        $cityFile = __DIR__ . '/../Resources/data/cities.csv';

        //DIRECTORY
        $directory = getenv('LOAD_DIRECTORY');
        if (false === $directory) {
            $directory = sys_get_temp_dir();
        }
        $this->countryCSV = $directory . DIRECTORY_SEPARATOR . 'country.csv';
        $this->cityCSV = $directory . DIRECTORY_SEPARATOR . 'cities.csv';

        //Files copy
        if (1 === getenv('COPY_FILES')) {
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
     * Database creation.
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
        $this->addSql('CREATE SEQUENCE data.te_address_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data.te_dog_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data.te_kennel_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE relation.tr_locality_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data.te_owner_usr_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE data.te_address (id INT NOT NULL, locality_id INT DEFAULT NULL, region TEXT DEFAULT NULL, post_office_box_number TEXT DEFAULT NULL, postal_code TEXT DEFAULT NULL, street_address TEXT DEFAULT NULL, ad_geometry Geometry DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E6616F0088823A92 ON data.te_address (locality_id)');
        $this->addSql('COMMENT ON COLUMN data.te_address.ad_geometry IS \'(DC2Type:geometry)\'');
        $this->addSql('CREATE TABLE relation.tr_country (code VARCHAR(2) NOT NULL, name VARCHAR(100) NOT NULL, co_geom Geometry DEFAULT NULL, PRIMARY KEY(code))');
        $this->addSql('COMMENT ON COLUMN relation.tr_country.co_geom IS \'(DC2Type:geometry)\'');
        $this->addSql('CREATE TABLE data.te_dog (id INT NOT NULL, kennel_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, father_id INT DEFAULT NULL, mother_id INT DEFAULT NULL, birthday DATE DEFAULT NULL, breeder TEXT DEFAULT NULL, deathday DATE DEFAULT NULL, name VARCHAR(255) NOT NULL, pedigree_number VARCHAR(32) DEFAULT NULL, sex BOOLEAN DEFAULT NULL, sterilized BOOLEAN DEFAULT \'false\' NOT NULL, tatoo VARCHAR(16) DEFAULT NULL, hsf4 INT DEFAULT NULL, hsf4_genetic_tested BOOLEAN DEFAULT \'false\' NOT NULL, cea INT DEFAULT NULL, cea_genetic_tested BOOLEAN DEFAULT \'false\' NOT NULL, pra INT DEFAULT NULL, pra_genetic_tested BOOLEAN DEFAULT \'false\' NOT NULL, mdr1 INT DEFAULT NULL, mdr1_genetic_tested BOOLEAN DEFAULT \'false\' NOT NULL, hd INT DEFAULT NULL, ed INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B7410354F061503E ON data.te_dog (kennel_id)');
        $this->addSql('CREATE INDEX IDX_B74103547E3C61F9 ON data.te_dog (owner_id)');
        $this->addSql('CREATE INDEX IDX_B74103542055B9A2 ON data.te_dog (father_id)');
        $this->addSql('CREATE INDEX IDX_B7410354B78A354D ON data.te_dog (mother_id)');
        $this->addSql('CREATE TABLE data.te_kennel (id INT NOT NULL, address_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, legal_name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_662BCC49F5B7AF75 ON data.te_kennel (address_id)');
        $this->addSql('CREATE INDEX IDX_662BCC497E3C61F9 ON data.te_kennel (owner_id)');
        $this->addSql('CREATE TABLE relation.tr_locality (id INT NOT NULL, country_code VARCHAR(2) DEFAULT NULL, name VARCHAR(200) NOT NULL, lo_geometry Geometry DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E0C3C300AC69ADE8 ON relation.tr_locality (country_code)');
        $this->addSql('COMMENT ON COLUMN relation.tr_locality.lo_geometry IS \'(DC2Type:geometry)\'');
        $this->addSql('CREATE TABLE data.te_owner (usr_id INT NOT NULL, address_id INT DEFAULT NULL, usr_additional_name TEXT DEFAULT NULL, usr_email TEXT NOT NULL, usr_family_name TEXT DEFAULT NULL, usr_given_name TEXT DEFAULT NULL, age_job_title TEXT DEFAULT NULL, usr_name TEXT DEFAULT NULL, usr_password TEXT DEFAULT NULL, usr_active BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(usr_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D2A9648F5B7AF75 ON data.te_owner (address_id)');
        $this->addSql('CREATE UNIQUE INDEX uk_usr_email ON data.te_owner (usr_email)');
        $this->addSql('ALTER TABLE data.te_address ADD CONSTRAINT FK_E6616F0088823A92 FOREIGN KEY (locality_id) REFERENCES relation.tr_locality (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_B7410354F061503E FOREIGN KEY (kennel_id) REFERENCES data.te_kennel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_B74103547E3C61F9 FOREIGN KEY (owner_id) REFERENCES data.te_owner (usr_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_B74103542055B9A2 FOREIGN KEY (father_id) REFERENCES data.te_dog (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_dog ADD CONSTRAINT FK_B7410354B78A354D FOREIGN KEY (mother_id) REFERENCES data.te_dog (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_kennel ADD CONSTRAINT FK_662BCC49F5B7AF75 FOREIGN KEY (address_id) REFERENCES data.te_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_kennel ADD CONSTRAINT FK_662BCC497E3C61F9 FOREIGN KEY (owner_id) REFERENCES data.te_owner (usr_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE relation.tr_locality ADD CONSTRAINT FK_E0C3C300AC69ADE8 FOREIGN KEY (country_code) REFERENCES relation.tr_country (code) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data.te_owner ADD CONSTRAINT FK_4D2A9648F5B7AF75 FOREIGN KEY (address_id) REFERENCES data.te_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_country_code ON relation.tr_country (code)');
        $this->addSql('ALTER INDEX relation.idx_e0c3c300ac69ade8 RENAME TO IDX_25B15991F026BB7C');

        //$cityFile = __DIR__ . '/../Resources/data/city.csv';
        $this->addsql("COPY relation.tr_country (code, name) FROM '{$this->countryCSV}' WITH (FORMAT CSV)");
        //unlink($destinationFile);
        $this->addsql("CREATE TABLE relation.tr_city (country VARCHAR(2) DEFAULT NULL, 	code VARCHAR(200) DEFAULT NULL, name VARCHAR(200) DEFAULT NULL, region varchar(3) DEFAULT NULL,	population varchar(9) DEFAULT NULL, latitude double precision DEFAULT NULL, longitude double precision DEFAULT NULL)");
        $this->addsql("COPY relation.tr_city (country, code, name, region, population, latitude, longitude) FROM '{$this->cityCSV}' WITH (FORMAT CSV)");
        $this->addsql("INSERT INTO relation.tr_locality (id, country_code, name, lo_geometry) SELECT nextval('relation.tr_locality_id_seq'), upper(country), name, st_point(latitude, longitude) FROM relation.tr_city");
        $this->addsql("DROP TABLE relation.tr_city");

    }

    /**
     * Database reseted.
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

        $this->addSql('ALTER TABLE data.te_kennel DROP CONSTRAINT FK_662BCC49F5B7AF75');
        $this->addSql('ALTER TABLE data.te_owner DROP CONSTRAINT FK_4D2A9648F5B7AF75');
        $this->addSql('ALTER TABLE relation.tr_locality DROP CONSTRAINT FK_E0C3C300AC69ADE8');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_B74103542055B9A2');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_B7410354B78A354D');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_B7410354F061503E');
        $this->addSql('ALTER TABLE data.te_address DROP CONSTRAINT FK_E6616F0088823A92');
        $this->addSql('ALTER TABLE data.te_dog DROP CONSTRAINT FK_B74103547E3C61F9');
        $this->addSql('ALTER TABLE data.te_kennel DROP CONSTRAINT FK_662BCC497E3C61F9');
        $this->addSql('DROP SEQUENCE data.te_address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data.te_dog_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data.te_kennel_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE relation.tr_locality_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data.te_owner_usr_id_seq CASCADE');
        $this->addSql('DROP TABLE data.te_address');
        $this->addSql('DROP TABLE relation.tr_country');
        $this->addSql('DROP TABLE data.te_dog');
        $this->addSql('DROP TABLE data.te_kennel');
        $this->addSql('DROP TABLE relation.tr_locality');
        $this->addSql('DROP TABLE data.te_owner');
        $this->addSql('DROP SCHEMA relation');
        $this->addSql('DROP SCHEMA data');
    }
}
