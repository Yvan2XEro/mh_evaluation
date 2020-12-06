<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201205172130 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mhclass (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mhexam (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, class_id INT DEFAULT NULL, session DATE NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_B515F871F675F31B (author_id), INDEX IDX_B515F871EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mhquestion (id INT AUTO_INCREMENT NOT NULL, session DATE NOT NULL, bagin_at DATETIME NOT NULL, end_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mhresponse (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, student_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_7B7110981E27F6BF (question_id), INDEX IDX_7B711098CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mhuser (id INT AUTO_INCREMENT NOT NULL, student_class_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3D88FEE7927C74 (email), INDEX IDX_3D88FE598B478B (student_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mhexam ADD CONSTRAINT FK_B515F871F675F31B FOREIGN KEY (author_id) REFERENCES mhuser (id)');
        $this->addSql('ALTER TABLE mhexam ADD CONSTRAINT FK_B515F871EA000B10 FOREIGN KEY (class_id) REFERENCES mhclass (id)');
        $this->addSql('ALTER TABLE mhresponse ADD CONSTRAINT FK_7B7110981E27F6BF FOREIGN KEY (question_id) REFERENCES mhquestion (id)');
        $this->addSql('ALTER TABLE mhresponse ADD CONSTRAINT FK_7B711098CB944F1A FOREIGN KEY (student_id) REFERENCES mhuser (id)');
        $this->addSql('ALTER TABLE mhuser ADD CONSTRAINT FK_3D88FE598B478B FOREIGN KEY (student_class_id) REFERENCES mhclass (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mhexam DROP FOREIGN KEY FK_B515F871EA000B10');
        $this->addSql('ALTER TABLE mhuser DROP FOREIGN KEY FK_3D88FE598B478B');
        $this->addSql('ALTER TABLE mhresponse DROP FOREIGN KEY FK_7B7110981E27F6BF');
        $this->addSql('ALTER TABLE mhexam DROP FOREIGN KEY FK_B515F871F675F31B');
        $this->addSql('ALTER TABLE mhresponse DROP FOREIGN KEY FK_7B711098CB944F1A');
        $this->addSql('DROP TABLE mhclass');
        $this->addSql('DROP TABLE mhexam');
        $this->addSql('DROP TABLE mhquestion');
        $this->addSql('DROP TABLE mhresponse');
        $this->addSql('DROP TABLE mhuser');
    }
}
