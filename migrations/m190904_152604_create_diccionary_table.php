<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diccionary}}`.
 */
class m190904_152604_create_diccionary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diccionary}}', [
            'id' => $this->primaryKey(),
            'word' => $this->string(),
            'language' => $this->string(),
            'translate' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%diccionary}}');
    }
}
