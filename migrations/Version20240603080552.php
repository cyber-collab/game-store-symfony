<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603080552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE subcategory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE subcategory (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE subcategory_category (subcategory_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(subcategory_id, category_id))');
        $this->addSql('CREATE INDEX IDX_B33C6E275DC6FE57 ON subcategory_category (subcategory_id)');
        $this->addSql('CREATE INDEX IDX_B33C6E2712469DE2 ON subcategory_category (category_id)');
        $this->addSql('ALTER TABLE subcategory_category ADD CONSTRAINT FK_B33C6E275DC6FE57 FOREIGN KEY (subcategory_id) REFERENCES subcategory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subcategory_category ADD CONSTRAINT FK_B33C6E2712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE subcategory_id_seq CASCADE');
        $this->addSql('ALTER TABLE subcategory_category DROP CONSTRAINT FK_B33C6E275DC6FE57');
        $this->addSql('ALTER TABLE subcategory_category DROP CONSTRAINT FK_B33C6E2712469DE2');
        $this->addSql('DROP TABLE subcategory');
        $this->addSql('DROP TABLE subcategory_category');
    }
}
