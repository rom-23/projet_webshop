<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121235827 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE specificities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specificities_product (specificities_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_805E63F2ABA8A3A8 (specificities_id), INDEX IDX_805E63F24584665A (product_id), PRIMARY KEY(specificities_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specificities_product ADD CONSTRAINT FK_805E63F2ABA8A3A8 FOREIGN KEY (specificities_id) REFERENCES specificities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specificities_product ADD CONSTRAINT FK_805E63F24584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE specificities_product DROP FOREIGN KEY FK_805E63F2ABA8A3A8');
        $this->addSql('DROP TABLE specificities');
        $this->addSql('DROP TABLE specificities_product');
    }
}
