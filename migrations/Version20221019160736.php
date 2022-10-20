<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019160736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE build_category (build_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_E26F43B717C13F8B (build_id), INDEX IDX_E26F43B712469DE2 (category_id), PRIMARY KEY(build_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE build_category ADD CONSTRAINT FK_E26F43B717C13F8B FOREIGN KEY (build_id) REFERENCES build (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE build_category ADD CONSTRAINT FK_E26F43B712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_build DROP FOREIGN KEY FK_5593BD9217C13F8B');
        $this->addSql('ALTER TABLE category_build DROP FOREIGN KEY FK_5593BD9212469DE2');
        $this->addSql('DROP TABLE category_build');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_build (category_id INT NOT NULL, build_id INT NOT NULL, INDEX IDX_5593BD9217C13F8B (build_id), INDEX IDX_5593BD9212469DE2 (category_id), PRIMARY KEY(category_id, build_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_build ADD CONSTRAINT FK_5593BD9217C13F8B FOREIGN KEY (build_id) REFERENCES build (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_build ADD CONSTRAINT FK_5593BD9212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE build_category DROP FOREIGN KEY FK_E26F43B717C13F8B');
        $this->addSql('ALTER TABLE build_category DROP FOREIGN KEY FK_E26F43B712469DE2');
        $this->addSql('DROP TABLE build_category');
    }
}
