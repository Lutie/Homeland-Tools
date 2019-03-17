<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190317045838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stuff (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, category INT NOT NULL, quality INT NOT NULL, height INT NOT NULL, weight INT NOT NULL, family VARCHAR(255) DEFAULT NULL, particularities VARCHAR(255) DEFAULT NULL, price INT NOT NULL, weapon_grip VARCHAR(10) DEFAULT NULL, weapon_kind VARCHAR(10) DEFAULT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff_family (id INT AUTO_INCREMENT NOT NULL, effect_on_score INT NOT NULL, effect_on_attack_score INT NOT NULL, effect_on_defense_score INT NOT NULL, effect_on_tactical_score INT NOT NULL, effect_on_hardness INT NOT NULL, effect_on_reach INT NOT NULL, effect_on_speed INT NOT NULL, effect_on_quickness INT NOT NULL, effect_on_price INT NOT NULL, effect_on_weight INT NOT NULL, effect_on_penality INT NOT NULL, effect_on_counter_attack_score INT NOT NULL, effect_on_adversary_defense_score INT NOT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff_particularity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stuff');
        $this->addSql('DROP TABLE stuff_family');
        $this->addSql('DROP TABLE stuff_particularity');
    }
}
