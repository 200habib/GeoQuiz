<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250209174153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A251E27F6BF ON answer (question_id)');
        $this->addSql('ALTER TABLE question ADD quiz_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494E853CD175 ON question (quiz_id)');
        $this->addSql('ALTER TABLE quiz ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA9212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_A412FA9212469DE2 ON quiz (category_id)');
        $this->addSql('ALTER TABLE user_category_score ADD user_id INT NOT NULL, ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_category_score ADD CONSTRAINT FK_B12FA741A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_category_score ADD CONSTRAINT FK_B12FA74112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_B12FA741A76ED395 ON user_category_score (user_id)');
        $this->addSql('CREATE INDEX IDX_B12FA74112469DE2 ON user_category_score (category_id)');
        $this->addSql('ALTER TABLE user_score ADD user_id INT NOT NULL, ADD quiz_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_score ADD CONSTRAINT FK_D05BCC09A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_score ADD CONSTRAINT FK_D05BCC09853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('CREATE INDEX IDX_D05BCC09A76ED395 ON user_score (user_id)');
        $this->addSql('CREATE INDEX IDX_D05BCC09853CD175 ON user_score (quiz_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('DROP INDEX IDX_DADD4A251E27F6BF ON answer');
        $this->addSql('ALTER TABLE answer DROP question_id');
        $this->addSql('ALTER TABLE user_score DROP FOREIGN KEY FK_D05BCC09A76ED395');
        $this->addSql('ALTER TABLE user_score DROP FOREIGN KEY FK_D05BCC09853CD175');
        $this->addSql('DROP INDEX IDX_D05BCC09A76ED395 ON user_score');
        $this->addSql('DROP INDEX IDX_D05BCC09853CD175 ON user_score');
        $this->addSql('ALTER TABLE user_score DROP user_id, DROP quiz_id');
        $this->addSql('ALTER TABLE user_category_score DROP FOREIGN KEY FK_B12FA741A76ED395');
        $this->addSql('ALTER TABLE user_category_score DROP FOREIGN KEY FK_B12FA74112469DE2');
        $this->addSql('DROP INDEX IDX_B12FA741A76ED395 ON user_category_score');
        $this->addSql('DROP INDEX IDX_B12FA74112469DE2 ON user_category_score');
        $this->addSql('ALTER TABLE user_category_score DROP user_id, DROP category_id');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA9212469DE2');
        $this->addSql('DROP INDEX IDX_A412FA9212469DE2 ON quiz');
        $this->addSql('ALTER TABLE quiz DROP category_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('DROP INDEX IDX_B6F7494E853CD175 ON question');
        $this->addSql('ALTER TABLE question DROP quiz_id');
    }
}
