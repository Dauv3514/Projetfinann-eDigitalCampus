<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210708082158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE presence (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, sorties_id INT DEFAULT NULL, validation TINYINT(1) NOT NULL, INDEX IDX_6977C7A567B3B43D (users_id), INDEX IDX_6977C7A515DFCFB2 (sorties_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A567B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A515DFCFB2 FOREIGN KEY (sorties_id) REFERENCES sortie (id)');
        $this->addSql('ALTER TABLE sortie CHANGE datecreationsortie datecreationsortie DATETIME NOT NULL, CHANGE miseajoursortie miseajoursortie DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE datecreationducompte datecreationducompte DATETIME NOT NULL, CHANGE miseajourcreationducompte miseajourcreationducompte DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE presence');
        $this->addSql('ALTER TABLE sortie CHANGE datecreationsortie datecreationsortie DATETIME DEFAULT NULL, CHANGE miseajoursortie miseajoursortie DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE datecreationducompte datecreationducompte DATETIME DEFAULT NULL, CHANGE miseajourcreationducompte miseajourcreationducompte DATETIME DEFAULT NULL');
    }
}
