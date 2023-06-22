<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614121454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, a_priority_id INT NOT NULL, day_id INT NOT NULL, word VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, color VARCHAR(255) NOT NULL, place VARCHAR(255) DEFAULT NULL, INDEX IDX_AC74095AB0022831 (a_priority_id), INDEX IDX_AC74095A9C24126 (day_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, is_public_holiday TINYINT(1) NOT NULL, last_day_created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, color VARCHAR(255) NOT NULL, place VARCHAR(255) DEFAULT NULL, remaining_day INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, color VARCHAR(255) NOT NULL, place VARCHAR(255) DEFAULT NULL, teacher VARCHAR(255) DEFAULT NULL, subject VARCHAR(255) NOT NULL, duration TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE priority (id INT AUTO_INCREMENT NOT NULL, index_priority INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_type (id INT AUTO_INCREMENT NOT NULL, warm_up TINYINT(1) NOT NULL, recovery TINYINT(1) NOT NULL, word VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport (id INT AUTO_INCREMENT NOT NULL, a_sesssion_type_id INT NOT NULL, word VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, color VARCHAR(255) NOT NULL, place VARCHAR(255) DEFAULT NULL, total_distance DOUBLE PRECISION DEFAULT NULL, total_time TIME DEFAULT NULL, INDEX IDX_1A85EFD2ED164802 (a_sesssion_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AB0022831 FOREIGN KEY (a_priority_id) REFERENCES priority (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A9C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE sport ADD CONSTRAINT FK_1A85EFD2ED164802 FOREIGN KEY (a_sesssion_type_id) REFERENCES session_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AB0022831');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A9C24126');
        $this->addSql('ALTER TABLE sport DROP FOREIGN KEY FK_1A85EFD2ED164802');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE day');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE priority');
        $this->addSql('DROP TABLE session_type');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
