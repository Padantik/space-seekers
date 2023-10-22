<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231022153146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, star_id INT DEFAULT NULL, distance_from_star DOUBLE PRECISION NOT NULL, axial_tilt DOUBLE PRECISION NOT NULL, rotation_cycle DOUBLE PRECISION NOT NULL, orbital_cycle DOUBLE PRECISION NOT NULL, surface_matter DOUBLE PRECISION NOT NULL, radius DOUBLE PRECISION NOT NULL, mass VARCHAR(255) NOT NULL, gravity DOUBLE PRECISION NOT NULL, effective_temperature DOUBLE PRECISION NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_68136AA52C3B70D7 (star_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE star (id INT AUTO_INCREMENT NOT NULL, star_system_id INT DEFAULT NULL, star_spectral_type_id INT DEFAULT NULL, luminosity DOUBLE PRECISION NOT NULL, radius DOUBLE PRECISION NOT NULL, mass VARCHAR(255) NOT NULL, gravity DOUBLE PRECISION NOT NULL, effective_temperature DOUBLE PRECISION NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C9DB5A1456C2D4D0 (star_system_id), INDEX IDX_C9DB5A14F55CD36C (star_spectral_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE star_system (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, age BIGINT NOT NULL, description LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FB9A8A80989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planet ADD CONSTRAINT FK_68136AA52C3B70D7 FOREIGN KEY (star_id) REFERENCES planet (id)');
        $this->addSql('ALTER TABLE star ADD CONSTRAINT FK_C9DB5A1456C2D4D0 FOREIGN KEY (star_system_id) REFERENCES star_system (id)');
        $this->addSql('ALTER TABLE star ADD CONSTRAINT FK_C9DB5A14F55CD36C FOREIGN KEY (star_spectral_type_id) REFERENCES star_spectral_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planet DROP FOREIGN KEY FK_68136AA52C3B70D7');
        $this->addSql('ALTER TABLE star DROP FOREIGN KEY FK_C9DB5A1456C2D4D0');
        $this->addSql('ALTER TABLE star DROP FOREIGN KEY FK_C9DB5A14F55CD36C');
        $this->addSql('DROP TABLE planet');
        $this->addSql('DROP TABLE star');
        $this->addSql('DROP TABLE star_system');
    }
}
