<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m190220_143738_create_file_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file_image}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'file' => $this->string()->notNull(),
        ]);

        $this->createIndex("ix_file_image", '{{%file_image}}', 'task_id');
        $this->addForeignKey('fk_file_image_task_id','{{%file_image}}', 'task_id', "{{%tasks}}", 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%file_image}}');
    }
}
