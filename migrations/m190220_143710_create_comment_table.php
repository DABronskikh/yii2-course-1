<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m190220_143710_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'comment' => $this->string()->notNull(),
        ]);

        $this->createIndex("ix_coment", '{{%comment}}', 'task_id');
        $this->addForeignKey('fk_comment_task_id','{{%comment}}', 'task_id', "{{%tasks}}", 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
