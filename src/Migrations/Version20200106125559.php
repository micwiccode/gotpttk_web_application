<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106125559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE administrator (id_a INT AUTO_INCREMENT NOT NULL, imie TINYTEXT NOT NULL, nazwisko TINYTEXT NOT NULL, login TINYTEXT NOT NULL, haslo TINYTEXT NOT NULL, PRIMARY KEY(id_a)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (idB INT AUTO_INCREMENT NOT NULL, numberOfPoints INT NOT NULL, PRIMARY KEY(idB)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazeczka_weryfikowana (id_k INT NOT NULL, id_p INT NOT NULL, data_weryfikacji DATE DEFAULT NULL, PRIMARY KEY(id_k, id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mountain_group (idG INT AUTO_INCREMENT NOT NULL, name TINYTEXT NOT NULL, groupCode TINYTEXT NOT NULL, PRIMARY KEY(idG)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point (idP INT AUTO_INCREMENT NOT NULL, name TINYTEXT NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(idP)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE przodownik_got (id_p INT AUTO_INCREMENT NOT NULL, imie TINYTEXT NOT NULL, nazwisko TINYTEXT NOT NULL, login TINYTEXT NOT NULL, haslo TINYTEXT NOT NULL, id_a INT NOT NULL, PRIMARY KEY(id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE przodownik_grupy (id_p INT NOT NULL, id_g INT NOT NULL, data_pg DATE DEFAULT NULL, PRIMARY KEY(id_p, id_g)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route (idR INT AUTO_INCREMENT NOT NULL, sumOfPointsGOT INT NOT NULL, routeLength DOUBLE PRECISION NOT NULL, hasSectionsOutOfBase TINYINT(1) NOT NULL, is_verified TINYINT(1) NOT NULL, route_date DATE DEFAULT NULL, idBook INT NOT NULL, INDEX IDX_2C42079B818FDAF (idBook), PRIMARY KEY(idR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (idS INT AUTO_INCREMENT NOT NULL, pointsGOT INT DEFAULT NULL, sectionLength DOUBLE PRECISION DEFAULT NULL, elevationGain DOUBLE PRECISION DEFAULT NULL, startPoint INT NOT NULL, endPoint INT NOT NULL, idG INT NOT NULL, INDEX IDX_2D737AEF14F8C1F9 (startPoint), INDEX IDX_2D737AEF583207F (endPoint), INDEX IDX_2D737AEF516E532D (idG), PRIMARY KEY(idS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_route (section_date DATE DEFAULT NULL, idR INT NOT NULL, idS INT NOT NULL, INDEX IDX_9593471D3CB3B7C6 (idR), INDEX IDX_9593471D4BB48750 (idS), PRIMARY KEY(idR, idS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stopien (id_s INT AUTO_INCREMENT NOT NULL, nazwa TINYTEXT NOT NULL, wymagana_liczba_punktow INT NOT NULL, PRIMARY KEY(id_s)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stopien_ksiazeczki (id_k INT NOT NULL, id_s INT NOT NULL, data_zdobycia DATE DEFAULT NULL, PRIMARY KEY(id_k, id_s)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turysta (id_tu INT AUTO_INCREMENT NOT NULL, imie TINYTEXT NOT NULL, nazwisko TINYTEXT NOT NULL, login TINYTEXT NOT NULL, haslo TINYTEXT NOT NULL, id_k INT DEFAULT NULL, UNIQUE INDEX UNIQ_6CD0D0B8CFF7FD22 (id_k), PRIMARY KEY(id_tu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C42079B818FDAF FOREIGN KEY (idBook) REFERENCES book (idB)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF14F8C1F9 FOREIGN KEY (startPoint) REFERENCES point (idP)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF583207F FOREIGN KEY (endPoint) REFERENCES point (idP)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF516E532D FOREIGN KEY (idG) REFERENCES mountain_group (idG)');
        $this->addSql('ALTER TABLE section_route ADD CONSTRAINT FK_9593471D3CB3B7C6 FOREIGN KEY (idR) REFERENCES route (idR)');
        $this->addSql('ALTER TABLE section_route ADD CONSTRAINT FK_9593471D4BB48750 FOREIGN KEY (idS) REFERENCES section (idS)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE route DROP FOREIGN KEY FK_2C42079B818FDAF');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF516E532D');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF14F8C1F9');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF583207F');
        $this->addSql('ALTER TABLE section_route DROP FOREIGN KEY FK_9593471D3CB3B7C6');
        $this->addSql('ALTER TABLE section_route DROP FOREIGN KEY FK_9593471D4BB48750');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE ksiazeczka_weryfikowana');
        $this->addSql('DROP TABLE mountain_group');
        $this->addSql('DROP TABLE point');
        $this->addSql('DROP TABLE przodownik_got');
        $this->addSql('DROP TABLE przodownik_grupy');
        $this->addSql('DROP TABLE route');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE section_route');
        $this->addSql('DROP TABLE stopien');
        $this->addSql('DROP TABLE stopien_ksiazeczki');
        $this->addSql('DROP TABLE turysta');
    }
}
