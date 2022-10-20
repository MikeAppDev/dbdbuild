<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020074302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE build_killer (build_id INT NOT NULL, killer_id INT NOT NULL, INDEX IDX_46FDBFF417C13F8B (build_id), INDEX IDX_46FDBFF4CD5FD5FF (killer_id), PRIMARY KEY(build_id, killer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE killer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE build_killer ADD CONSTRAINT FK_46FDBFF417C13F8B FOREIGN KEY (build_id) REFERENCES build (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE build_killer ADD CONSTRAINT FK_46FDBFF4CD5FD5FF FOREIGN KEY (killer_id) REFERENCES killer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE build_killer DROP FOREIGN KEY FK_46FDBFF417C13F8B');
        $this->addSql('ALTER TABLE build_killer DROP FOREIGN KEY FK_46FDBFF4CD5FD5FF');
        $this->addSql('DROP TABLE build_killer');
        $this->addSql('DROP TABLE killer');
    }
}
