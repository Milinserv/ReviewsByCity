<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m240206_101353_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'id_city' => $this->integer(),
            'title' => $this->string(),
            'text' => $this->text(),
            'rating' => $this->integer(),
            'img' => $this->string()->defaultValue(null),
            'id_author' => $this->integer(),
            'date_create' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
