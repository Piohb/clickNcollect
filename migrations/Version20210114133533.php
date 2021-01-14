<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210114133533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADDCD6110');
        $this->addSql('CREATE TABLE stocks (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, shop_id INT NOT NULL, price INT NOT NULL, INDEX IDX_56F798054584665A (product_id), INDEX IDX_56F798054D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F798054584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F798054D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP INDEX IDX_D34A04ADDCD6110 ON product');
        $this->addSql('ALTER TABLE product DROP stock_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, shop_id INT NOT NULL, stock INT NOT NULL, price INT NOT NULL, INDEX IDX_4B3656604D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B3656604D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('DROP TABLE stocks');
        $this->addSql('ALTER TABLE product ADD stock_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADDCD6110 ON product (stock_id)');
    }
}
