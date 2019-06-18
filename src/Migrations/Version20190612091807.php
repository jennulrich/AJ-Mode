<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612091807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop ADD user_id INT DEFAULT NULL, DROP address, DROP owner, DROP email, DROP phone');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AC6A4CA2A76ED395 ON shop (user_id)');
        $this->addSql('ALTER TABLE user ADD is_user TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE catalog ADD shop_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE catalog ADD CONSTRAINT FK_1B2C32474D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('CREATE INDEX IDX_1B2C32474D16C4DD ON catalog (shop_id)');
        $this->addSql('ALTER TABLE orders ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E52FFDEEA76ED395 ON orders (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE catalog DROP FOREIGN KEY FK_1B2C32474D16C4DD');
        $this->addSql('DROP INDEX IDX_1B2C32474D16C4DD ON catalog');
        $this->addSql('ALTER TABLE catalog DROP shop_id');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('DROP INDEX UNIQ_E52FFDEEA76ED395 ON orders');
        $this->addSql('ALTER TABLE orders DROP user_id');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA2A76ED395');
        $this->addSql('DROP INDEX UNIQ_AC6A4CA2A76ED395 ON shop');
        $this->addSql('ALTER TABLE shop ADD address VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD owner VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD phone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP user_id');
        $this->addSql('ALTER TABLE user DROP is_user');
    }
}
