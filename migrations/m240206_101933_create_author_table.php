<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m240206_101933_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(),
            'email' => $this->string()->defaultValue(null),
            'phone' => $this->string(),
            'date_create' => $this->date(),
            'password' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
