<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220913145117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'set default null for maximumPlayer';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE game CHANGE maximum_player maximum_player INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE game CHANGE maximum_player maximum_player INT NOT NULL');
    }
}
