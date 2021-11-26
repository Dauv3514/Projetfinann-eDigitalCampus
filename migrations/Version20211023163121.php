<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211023163121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information CHANGE sortie_id sortie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE presence CHANGE users_id users_id INT DEFAULT NULL, CHANGE sorties_id sorties_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sortie CHANGE user_id user_id INT DEFAULT NULL, CHANGE datecreationsortie datecreationsortie DATETIME NOT NULL, CHANGE miseajoursortie miseajoursortie DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE datecreationducompte datecreationducompte DATETIME NOT NULL, CHANGE miseajourcreationducompte miseajourcreationducompte DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information CHANGE sortie_id sortie_id INT NOT NULL');
        $this->addSql('ALTER TABLE presence CHANGE users_id users_id INT NOT NULL, CHANGE sorties_id sorties_id INT NOT NULL');
        $this->addSql('ALTER TABLE sortie CHANGE user_id user_id INT NOT NULL, CHANGE datecreationsortie datecreationsortie DATETIME DEFAULT NULL, CHANGE miseajoursortie miseajoursortie DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE datecreationducompte datecreationducompte DATETIME DEFAULT NULL, CHANGE miseajourcreationducompte miseajourcreationducompte DATETIME DEFAULT NULL');
    }
}
