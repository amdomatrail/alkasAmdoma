<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302123749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chemise ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chemise ADD CONSTRAINT FK_25C79C9FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_25C79C9FA76ED395 ON chemise (user_id)');
        $this->addSql('ALTER TABLE marque_chemise ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE marque_chemise ADD CONSTRAINT FK_FC1D3F8AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FC1D3F8AA76ED395 ON marque_chemise (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marque_chemise DROP FOREIGN KEY FK_FC1D3F8AA76ED395');
        $this->addSql('DROP INDEX IDX_FC1D3F8AA76ED395 ON marque_chemise');
        $this->addSql('ALTER TABLE marque_chemise DROP user_id');
        $this->addSql('ALTER TABLE chemise DROP FOREIGN KEY FK_25C79C9FA76ED395');
        $this->addSql('DROP INDEX IDX_25C79C9FA76ED395 ON chemise');
        $this->addSql('ALTER TABLE chemise DROP user_id');
    }
}
