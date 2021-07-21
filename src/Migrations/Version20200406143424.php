<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406143424 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fullstuff (id INT AUTO_INCREMENT NOT NULL, stuff_id INT DEFAULT NULL, user_id INT DEFAULT NULL, quality INT NOT NULL, name VARCHAR(128) NOT NULL, INDEX IDX_818395E7950A1740 (stuff_id), INDEX IDX_818395E7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, family_id INT DEFAULT NULL, category INT NOT NULL, height INT NOT NULL, weight INT NOT NULL, shape INT NOT NULL, armor_is_advanced TINYINT(1) NOT NULL, weapon_grip VARCHAR(10) DEFAULT NULL, weapon_kind VARCHAR(10) DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, INDEX IDX_5941F83EC54C8C93 (type_id), INDEX IDX_5941F83EC35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff_stuff_particularity (stuff_id INT NOT NULL, stuff_particularity_id INT NOT NULL, INDEX IDX_5DBA47C1950A1740 (stuff_id), INDEX IDX_5DBA47C17F4464B0 (stuff_particularity_id), PRIMARY KEY(stuff_id, stuff_particularity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff_family (id INT AUTO_INCREMENT NOT NULL, effect_on_score INT NOT NULL, effect_on_attack_score INT NOT NULL, effect_on_defense_score INT NOT NULL, effect_on_tactical_score INT NOT NULL, effect_on_hardness INT NOT NULL, effect_on_reach INT NOT NULL, effect_on_speed INT NOT NULL, effect_on_quickness INT NOT NULL, effect_on_price INT NOT NULL, effect_on_weight INT NOT NULL, effect_on_penality INT NOT NULL, effect_on_counter_attack_score INT NOT NULL, effect_on_adversary_defense_score INT NOT NULL, magazine_capacity INT NOT NULL, added_magazine_by_category INT NOT NULL, is_mechanical TINYINT(1) NOT NULL, is_dangerous INT NOT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff_particularity (id INT AUTO_INCREMENT NOT NULL, effect_on_score INT NOT NULL, effect_on_attack_score INT NOT NULL, effect_on_defense_score INT NOT NULL, effect_on_tactical_score INT NOT NULL, effect_on_hardness INT NOT NULL, effect_on_reach INT NOT NULL, effect_on_speed INT NOT NULL, effect_on_quickness INT NOT NULL, effect_on_price INT NOT NULL, effect_on_weight INT NOT NULL, effect_on_penality INT NOT NULL, effect_on_counter_attack_score INT NOT NULL, effect_on_adversary_defense_score INT NOT NULL, effect_on_magazine INT NOT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuff_type (id INT AUTO_INCREMENT NOT NULL, price INT NOT NULL, added_price_by_weight INT NOT NULL, added_price_by_height INT NOT NULL, added_price_by_shape INT NOT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(128) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(128) NOT NULL, username VARCHAR(128) NOT NULL, email VARCHAR(128) NOT NULL, password VARCHAR(128) NOT NULL, date DATE NOT NULL, is_admin TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fullstuff ADD CONSTRAINT FK_818395E7950A1740 FOREIGN KEY (stuff_id) REFERENCES stuff (id)');
        $this->addSql('ALTER TABLE fullstuff ADD CONSTRAINT FK_818395E7A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE stuff ADD CONSTRAINT FK_5941F83EC54C8C93 FOREIGN KEY (type_id) REFERENCES stuff_type (id)');
        $this->addSql('ALTER TABLE stuff ADD CONSTRAINT FK_5941F83EC35E566A FOREIGN KEY (family_id) REFERENCES stuff_family (id)');
        $this->addSql('ALTER TABLE stuff_stuff_particularity ADD CONSTRAINT FK_5DBA47C1950A1740 FOREIGN KEY (stuff_id) REFERENCES stuff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stuff_stuff_particularity ADD CONSTRAINT FK_5DBA47C17F4464B0 FOREIGN KEY (stuff_particularity_id) REFERENCES stuff_particularity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fullstuff DROP FOREIGN KEY FK_818395E7950A1740');
        $this->addSql('ALTER TABLE stuff_stuff_particularity DROP FOREIGN KEY FK_5DBA47C1950A1740');
        $this->addSql('ALTER TABLE stuff DROP FOREIGN KEY FK_5941F83EC35E566A');
        $this->addSql('ALTER TABLE stuff_stuff_particularity DROP FOREIGN KEY FK_5DBA47C17F4464B0');
        $this->addSql('ALTER TABLE stuff DROP FOREIGN KEY FK_5941F83EC54C8C93');
        $this->addSql('ALTER TABLE fullstuff DROP FOREIGN KEY FK_818395E7A76ED395');
        $this->addSql('DROP TABLE fullstuff');
        $this->addSql('DROP TABLE stuff');
        $this->addSql('DROP TABLE stuff_stuff_particularity');
        $this->addSql('DROP TABLE stuff_family');
        $this->addSql('DROP TABLE stuff_particularity');
        $this->addSql('DROP TABLE stuff_type');
        $this->addSql('DROP TABLE users');
    }
}
