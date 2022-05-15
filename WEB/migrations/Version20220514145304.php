<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514145304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendar (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, description LONGTEXT NOT NULL, allday TINYINT(1) NOT NULL, background_color VARCHAR(7) NOT NULL, boarder_color VARCHAR(7) NOT NULL, texte_color VARCHAR(7) NOT NULL, INDEX IDX_6EA9A146A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events_reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, tel VARCHAR(255) NOT NULL, reservations INT NOT NULL, INDEX IDX_D8A20356A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events_reservation_calendar (events_reservation_id INT NOT NULL, calendar_id INT NOT NULL, INDEX IDX_E1F7873C1D8506ED (events_reservation_id), INDEX IDX_E1F7873CA40A2C8 (calendar_id), PRIMARY KEY(events_reservation_id, calendar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE calendar ADD CONSTRAINT FK_6EA9A146A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE events_reservation ADD CONSTRAINT FK_D8A20356A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE events_reservation_calendar ADD CONSTRAINT FK_E1F7873C1D8506ED FOREIGN KEY (events_reservation_id) REFERENCES events_reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE events_reservation_calendar ADD CONSTRAINT FK_E1F7873CA40A2C8 FOREIGN KEY (calendar_id) REFERENCES calendar (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events_reservation_calendar DROP FOREIGN KEY FK_E1F7873CA40A2C8');
        $this->addSql('ALTER TABLE events_reservation_calendar DROP FOREIGN KEY FK_E1F7873C1D8506ED');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE events_reservation');
        $this->addSql('DROP TABLE events_reservation_calendar');
    }
}
