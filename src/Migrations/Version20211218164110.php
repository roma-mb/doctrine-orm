<?php

declare(strict_types=1);

namespace DoctrineORM\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218164110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE course_student (course_id INTEGER NOT NULL, student_id INTEGER NOT NULL, PRIMARY KEY(course_id, student_id))');
        $this->addSql('CREATE INDEX IDX_BFE0AADF591CC992 ON course_student (course_id)');
        $this->addSql('CREATE INDEX IDX_BFE0AADFCB944F1A ON course_student (student_id)');
        $this->addSql('DROP INDEX IDX_444F97DDCB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__phone AS SELECT id, student_id, number FROM phone');
        $this->addSql('DROP TABLE phone');
        $this->addSql('CREATE TABLE phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, number VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_444F97DDCB944F1A FOREIGN KEY (student_id) REFERENCES student (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO phone (id, student_id, number) SELECT id, student_id, number FROM __temp__phone');
        $this->addSql('DROP TABLE __temp__phone');
        $this->addSql('CREATE INDEX IDX_444F97DDCB944F1A ON phone (student_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_student');
        $this->addSql('DROP INDEX IDX_444F97DDCB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__phone AS SELECT id, student_id, number FROM phone');
        $this->addSql('DROP TABLE phone');
        $this->addSql('CREATE TABLE phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, number VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO phone (id, student_id, number) SELECT id, student_id, number FROM __temp__phone');
        $this->addSql('DROP TABLE __temp__phone');
        $this->addSql('CREATE INDEX IDX_444F97DDCB944F1A ON phone (student_id)');
    }
}
