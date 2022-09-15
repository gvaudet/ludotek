<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220913101625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create game, editor and designer';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE designer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, picture VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, minimum_age INT NOT NULL, minimum_player INT NOT NULL, maximum_player INT NOT NULL, duration TIME NOT NULL, release_at DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE designer');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE game');
    }
}
