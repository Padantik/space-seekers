<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231022143101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, atomic_number INT NOT NULL, symbol VARCHAR(255) NOT NULL, phase_at_stp VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_41405E394003A5E2 (atomic_number), UNIQUE INDEX UNIQ_41405E39ECC836F9 (symbol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE star_spectral_type (id INT AUTO_INCREMENT NOT NULL, max_temperature DOUBLE PRECISION DEFAULT NULL, min_temperature DOUBLE PRECISION NOT NULL, chromaticity VARCHAR(255) NOT NULL, max_luminosity DOUBLE PRECISION DEFAULT NULL, min_luminosity DOUBLE PRECISION DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE star_spectral_type');
    }
}
