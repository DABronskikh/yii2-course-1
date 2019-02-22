<?php

use yii\db\Migration;

/**
 * Class m190215_095205_add_column_table
 */
class m190215_095205_add_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'email', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_095205_add_column_table cannot be reverted.\n";

        return false;
    }
    */
}
