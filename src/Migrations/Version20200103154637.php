<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200103154637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        //this up() migration is auto-generated, please modify it to your needs
          
        $this->addSql('INSERT INTO grupa_gorska VALUES (1,"TATRY WYSOKIE","T.01")');
        $this->addSql('INSERT INTO grupa_gorska VALUES (2,"TATRY ZACHODNIE","T.02")');

        $this->addSql('INSERT INTO punkt VALUES (1,"Wodogrzmoty Mickiewicza", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (2,"Schronisko PTTK nad Morskim Okiem (1410 m)", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (3,"Czarny Staw nad Morskim Okiem (1583 m)", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (4,"Palenica Białczańska", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (5,"Polana pod Wołoszynem", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (6,"Schronisko PTTK w Roztoce", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (7,"Rysy (2499 m)", NULL, NULL)');
        $this->addSql('INSERT INTO punkt VALUES (8,"Mięguszowiecka Przełęcz pod Chłopkiem (2307 m)", NULL, NULL)');

        $this->addSql('SET FOREIGN_KEY_CHECKS=0');

        $this->addSql('INSERT INTO odcinek VALUES (1,4,1,1,4,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (2,5,1,1,2,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (3,6,1,1,2,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (4,1,2,1,2,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (5,2,3,1,8,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (6,7,3,1,4,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (7,8,3,1,4,NULL, NULL)');
        $this->addSql('INSERT INTO odcinek VALUES (8,6,1,1,3,NULL, NULL)');

        $this->addSql('SET FOREIGN_KEY_CHECKS=1'); 
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        
    }
}
