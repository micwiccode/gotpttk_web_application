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
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (3,"PODTATRZE", "T.03")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (4,"BESKID ŚLĄSKI", "BZ.01")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (5,"BESKID ŻYWIECKI", "BZ.02")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (6,"BESKID MAŁY", "BZ.03")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (7,"BESKID ŚREDNI", "BZ.04")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (8,"GORCE", "BZ.05")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (9,"BESKID WYSPOWY", "BZ.06")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (10,"ORAWA", "BZ.07")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (11,"SZPISZ I PIENINY", "BZ.08")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (12,"BESKID SĄDECKI", "BZ.09")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (13,"POGÓRZE WIELICKIE", "BZ.10")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (14,"POGÓRZE WIŚNICKIE", "BZ.11")');
        $this->addSql('INSERT INTO mountain_group (idG, name, groupCode) VALUES (15,"POGÓRZE ROŻNOWSKIE", "BZ.12")');
        
        $this->addSql('INSERT INTO point VALUES (1,"Wodogrzmoty Mickiewicza", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (2,"Schronisko PTTK nad Morskim Okiem (1410 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (3,"Czarny Staw nad Morskim Okiem (1583 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (4,"Palenica Białczańska", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (5,"Polana pod Wołoszynem", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (6,"Schronisko PTTK w Roztoce", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (7,"Rysy (2499 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point VALUES (8,"Mięguszowiecka Przełęcz pod Chłopkiem (2307 m)", NULL, NULL)');
        $this->addSql('INSERT INTO point (idP, name) VALUES (9, "Dzięgielów - Zamek")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (10, "Jasieniowa (521 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (11, "Schronisko PTTK Tuł (621 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (12, "Ostry (712 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (13, "Mała Czantoria (864 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (14, "Czantoria Wielka (995 m)")');
        $this->addSql('INSERT INTO point (idP, name) VALUES (15, "Wisła - Jawornik")');

        $this->addSql('SET FOREIGN_KEY_CHECKS=0');

        $this->addSql('INSERT INTO section VALUES (1,4,NULL, NULL,4,1,1)');
        $this->addSql('INSERT INTO section VALUES (2,2,NULL, NULL,5,1,1)');
        $this->addSql('INSERT INTO section VALUES (3,2,NULL, NULL,6,1,1)');
        $this->addSql('INSERT INTO section VALUES (4,2,NULL, NULL,1,2,1)');
        $this->addSql('INSERT INTO section VALUES (5,8,NULL, NULL,2,3,1)');
        $this->addSql('INSERT INTO section VALUES (6,4,NULL, NULL,7,3,1)');
        $this->addSql('INSERT INTO section VALUES (7,4,NULL, NULL,8,3,1)');
        $this->addSql('INSERT INTO section VALUES (8,3,NULL, NULL,6,1,1)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,9,10,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,10,9,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,10,11,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,11,10,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,11,12,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,12,11,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,11,13,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,13,11,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (9,9,13,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (6,13,9,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (4,13,14,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (3,14,13,4)');
        $this->addSql('INSERT INTO section (pointsGOT, startPoint, endPoint, idG) VALUES (5,11,12,4)');
        
        $this->addSql('INSERT INTO degree (name,  requiredPointsAmount) VALUES ("W góry brązowa", 15)'); 
        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (1,1)'); 
        $this->addSql('INSERT INTO book (numberOfPoints) VALUES (36)');
        $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                        VALUES ("Kamil", "NOWAK", "user@user.pl", "1234", 1)');

        $this->addSql('INSERT INTO book_degree (idB, idD) VALUES (2,1)'); 
        $this->addSql('INSERT INTO book (idB, numberOfPoints) VALUES (2,20)');
        $this->addSql('INSERT INTO tourist (firstName, lastName, login, password, idB) 
                        VALUES ("Jan", "Kowalski", "jan@kowalski.com", "jan", 2)');
        
        $this->addSql('INSERT INTO route(idR, sumOfPointsGOT, routeLength, hasSectionsOutOfBase, is_verified, route_date, idBook) VALUES (1,10,12.5,false,false,"2020-01-01",1)');
        $this->addSql('INSERT INTO route(idR, sumOfPointsGOT, routeLength, hasSectionsOutOfBase, is_verified, route_date, idBook) VALUES (2,5,30.0,false,false,"2020-01-04",1)');
        $this->addSql('INSERT INTO route(idR, sumOfPointsGOT, routeLength, hasSectionsOutOfBase, is_verified, idBook) VALUES(3,7,10.0,false,false,2)');
            
        $this->addSql('INSERT INTO section_route (idR, idS) VALUES (1,14)');
        $this->addSql('INSERT INTO section_route (idR, idS) VALUES (1,15)');
            
        $this->addSql('INSERT INTO section_route (idR, idS) VALUES (2,9)');
            
        $this->addSql('INSERT INTO section_route (idR, idS) VALUES (3,19)');
        $this->addSql('INSERT INTO section_route (idR, idS) VALUES (3,20)');
        $this->addSql('SET FOREIGN_KEY_CHECKS=1'); 
    }
    public function down(Schema $schema) : void
    {
    
    }

}
