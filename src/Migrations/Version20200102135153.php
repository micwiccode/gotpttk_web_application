<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102135153 extends AbstractMigration
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
        $this->addSql('CREATE TABLE grupa_gorska (id_g INT AUTO_INCREMENT NOT NULL, nazwa TINYTEXT NOT NULL, kod_grupy TINYTEXT NOT NULL, PRIMARY KEY(id_g)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazeczka (id_k INT AUTO_INCREMENT NOT NULL, liczba_punktow INT NOT NULL, PRIMARY KEY(id_k)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazeczka_weryfikowana (id_k INT NOT NULL, id_p INT NOT NULL, data_weryfikacji DATE DEFAULT NULL, PRIMARY KEY(id_k, id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odcinek (id_o INT AUTO_INCREMENT NOT NULL, punkty_got INT DEFAULT NULL, dlugosc_odcinka DOUBLE PRECISION DEFAULT NULL, przewyzszenie DOUBLE PRECISION DEFAULT NULL, punkt_startowy INT NOT NULL, punkt_koncowy INT NOT NULL, id_g INT NOT NULL, PRIMARY KEY(id_o)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE odcinek_trasy (id_tr INT NOT NULL, id_o INT NOT NULL, data_odcinka DATE DEFAULT NULL, PRIMARY KEY(id_tr, id_o)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE przodownik_got (id_p INT AUTO_INCREMENT NOT NULL, imie TINYTEXT NOT NULL, nazwisko TINYTEXT NOT NULL, login TINYTEXT NOT NULL, haslo TINYTEXT NOT NULL, id_a INT NOT NULL, PRIMARY KEY(id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE przodownik_grupy (id_p INT NOT NULL, id_g INT NOT NULL, data_pg DATE DEFAULT NULL, PRIMARY KEY(id_p, id_g)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE punkt (id_pu INT AUTO_INCREMENT NOT NULL, nazwa TINYTEXT NOT NULL, szerokosc_geograficzna DOUBLE PRECISION DEFAULT NULL, dlugosc_geograficzna DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id_pu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stopien (id_s INT AUTO_INCREMENT NOT NULL, nazwa TINYTEXT NOT NULL, wymagana_liczba_punktow INT NOT NULL, PRIMARY KEY(id_s)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stopien_ksiazeczki (id_k INT NOT NULL, id_s INT NOT NULL, data_zdobycia DATE DEFAULT NULL, PRIMARY KEY(id_k, id_s)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trasa (id_tr INT AUTO_INCREMENT NOT NULL, suma_punktow_got INT NOT NULL, dlugosc_trasy DOUBLE PRECISION NOT NULL, czy_zawiera_odcinki_spoza_wykazu TINYINT(1) NOT NULL, zweryfikowana TINYINT(1) NOT NULL, data_trasy DATE DEFAULT NULL, ksiazeczka_id INT NOT NULL, PRIMARY KEY(id_tr)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turysta (id_tu INT AUTO_INCREMENT NOT NULL, imie TINYTEXT NOT NULL, nazwisko TINYTEXT NOT NULL, login TINYTEXT NOT NULL, haslo TINYTEXT NOT NULL, id_k INT DEFAULT NULL, UNIQUE INDEX UNIQ_6CD0D0B8CFF7FD22 (id_k), PRIMARY KEY(id_tu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE grupa_gorska');
        $this->addSql('DROP TABLE ksiazeczka');
        $this->addSql('DROP TABLE ksiazeczka_weryfikowana');
        $this->addSql('DROP TABLE odcinek');
        $this->addSql('DROP TABLE odcinek_trasy');
        $this->addSql('DROP TABLE przodownik_got');
        $this->addSql('DROP TABLE przodownik_grupy');
        $this->addSql('DROP TABLE punkt');
        $this->addSql('DROP TABLE stopien');
        $this->addSql('DROP TABLE stopien_ksiazeczki');
        $this->addSql('DROP TABLE trasa');
        $this->addSql('DROP TABLE turysta');
    }
}
