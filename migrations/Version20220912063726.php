<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912063726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, partner_name VARCHAR(255) NOT NULL, partner_phone INT NOT NULL, partner_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner_user (partner_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_DDA7E5519393F8FE (partner_id), INDEX IDX_DDA7E551A76ED395 (user_id), PRIMARY KEY(partner_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner_permission (id INT AUTO_INCREMENT NOT NULL, partner_permission_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, permission_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, strutuce_name VARCHAR(255) NOT NULL, structure_phone INT NOT NULL, structure_address VARCHAR(255) NOT NULL, structure_postal INT NOT NULL, structure_active TINYINT(1) NOT NULL, INDEX IDX_6F0137EAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure_permission (id INT AUTO_INCREMENT NOT NULL, structure_permission_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partner_user ADD CONSTRAINT FK_DDA7E5519393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partner_user ADD CONSTRAINT FK_DDA7E551A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partner_user DROP FOREIGN KEY FK_DDA7E5519393F8FE');
        $this->addSql('ALTER TABLE partner_user DROP FOREIGN KEY FK_DDA7E551A76ED395');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EAA76ED395');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE partner_user');
        $this->addSql('DROP TABLE partner_permission');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE structure');
        $this->addSql('DROP TABLE structure_permission');
    }
}
