<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707180258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sortie CHANGE datecreationsortie datecreationsortie DATETIME NOT NULL, CHANGE miseajoursortie miseajoursortie DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE datecreationducompte datecreationducompte DATETIME NOT NULL, CHANGE miseajourcreationducompte miseajourcreationducompte DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sortie CHANGE datecreationsortie datecreationsortie DATETIME DEFAULT NULL, CHANGE miseajoursortie miseajoursortie DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE datecreationducompte datecreationducompte DATETIME DEFAULT NULL, CHANGE miseajourcreationducompte miseajourcreationducompte DATETIME DEFAULT NULL');
    }
}
