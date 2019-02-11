<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m190208_133343_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'discription' => $this->string()->notNull(),
            'creator_id' => $this->integer()->notNull(),
            'responsible_id' => $this->integer()->notNull(),
            'date_create' => $this->date()->notNull(),
            'deadline' => $this->date()->notNull(),
            'status_id' => $this->integer()->notNull()
        ]);

        $this->createTable('{{%task_statuses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()
        ]);

        $this->createIndex("ix_task_responsible", "tasks", 'responsible_id');
        $this->createIndex("ix_task_creator", "tasks", 'creator_id');
        $this->createIndex("ix_task_status", "tasks", 'status_id');

        $this->addForeignKey('fk_task_statuses',"{{%tasks}}", 'status_id', "{{%task_statuses}}", 'id');
        $this->addForeignKey('fk_task_creator',"{{%tasks}}", 'creator_id', "{{%user}}", 'id');
        $this->addForeignKey('fk_task_responsible',"{{%tasks}}", 'responsible_id', "{{%user}}", 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
        $this->dropTable('{{%task_statuses}}');
    }
}
