<?php

use yii\db\Migration;

/**
 * Class m190214_161110_add_column_tasks_table
 */
class m190214_161110_add_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%tasks}}', 'date_create','created_at');
        $this->alterColumn('{{%tasks}}', 'created_at', $this->dateTime());

        $this->addColumn('{{%tasks}}', 'updated_at', $this->dateTime());
        $this->addColumn('{{%user}}', 'created_at', $this->dateTime());
        $this->addColumn('{{%user}}', 'updated_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tasks}}', 'created_at');
        $this->dropColumn('{{%tasks}}', 'updated_at');
        $this->dropColumn('{{%user}}', 'created_at');
        $this->dropColumn('{{%user}}', 'updated_at');
    }

}
