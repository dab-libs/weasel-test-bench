<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220107095636 extends AbstractMigration {
  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    $this->addSql('CREATE TABLE pet (pk SERIAL NOT NULL, id VARCHAR(64) NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(pk))');
  }

  public function down(Schema $schema): void {
    $this->addSql('DROP TABLE pet');
  }
}
