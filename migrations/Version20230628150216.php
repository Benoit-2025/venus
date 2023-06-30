<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628150216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF71128C5C');
        $this->addSql('DROP INDEX IDX_C509E4FF71128C5C ON chambre');
        $this->addSql('ALTER TABLE chambre DROP membres_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre ADD membres_id INT NOT NULL');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF71128C5C FOREIGN KEY (membres_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_C509E4FF71128C5C ON chambre (membres_id)');
    }
}
