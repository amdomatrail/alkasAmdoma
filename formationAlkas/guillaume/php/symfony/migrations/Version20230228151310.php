<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228151310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chemise (id INT AUTO_INCREMENT NOT NULL, marque_chemise_id INT NOT NULL, nom VARCHAR(50) NOT NULL, taille VARCHAR(5) NOT NULL, couleur VARCHAR(50) NOT NULL, INDEX IDX_25C79C9FB13B1D7F (marque_chemise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque_chemise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chemise ADD CONSTRAINT FK_25C79C9FB13B1D7F FOREIGN KEY (marque_chemise_id) REFERENCES marque_chemise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chemise DROP FOREIGN KEY FK_25C79C9FB13B1D7F');
        $this->addSql('DROP TABLE chemise');
        $this->addSql('DROP TABLE marque_chemise');
    }
}
