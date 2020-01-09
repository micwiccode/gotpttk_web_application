<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109180709 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        
        $this->addSql('INSERT INTO mountain_group VALUES (1,"TATRY WYSOKIE","T.01")');
        $this->addSql('INSERT INTO mountain_group VALUES (2,"TATRY ZACHODNIE","T.02")');
        $this->addSql('INSERT INTO point VALUES (1,"Wodogrzmoty Mickiewicza", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (2,"Schronisko PTTK nad Morskim Okiem (1410 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (3,"Czarny Staw nad Morskim Okiem (1583 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (4,"Palenica Białczańska", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (5,"Polana pod Wołoszynem", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (6,"Schronisko PTTK w Roztoce", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (7,"Rysy (2499 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (8,"Mięguszowiecka Przełęcz pod Chłopkiem (2307 m)", NULL, NULL)');
        $this->addSql('SET FOREIGN_KEY_CHECKS=0');
        $this->addSql('INSERT INTO section VALUES (1,4,NULL, NULL,4,1,1)');
        $this->addSql('INSERT INTO section VALUES (2,2,NULL, NULL,5,1,1)');
        $this->addSql('INSERT INTO section VALUES (3,2,NULL, NULL,6,1,1)');
        $this->addSql('INSERT INTO section VALUES (4,2,NULL, NULL,1,2,1)');
        $this->addSql('INSERT INTO section VALUES (5,8,NULL, NULL,2,3,1)');
        $this->addSql('INSERT INTO section VALUES (6,4,NULL, NULL,7,3,1)');
        $this->addSql('INSERT INTO section VALUES (7,4,NULL, NULL,8,3,1)');
        $this->addSql('INSERT INTO section VALUES (8,3,NULL, NULL,6,1,1)');
        $this->addSql('INSERT INTO degree (name,  requiredPointsAmount) VALUES ("W góry brązowa", 15)'); 
        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (1,1)'); 
        $this->addSql('INSERT INTO book (numberOfPoints) VALUES (36)');
        $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                        VALUES ("Kamil", "NOWAK", "user@user.pl", "1234", 1)');
        $this->addSql('SET FOREIGN_KEY_CHECKS=1'); 
    }
    public function down(Schema $schema) : void
    {
    
    }

}
