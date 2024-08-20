<?php

use yii\db\Migration;

/**
 * Class m240819_061909_alter_table_user
 */
class m240819_061909_alter_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('username', 'user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240819_061909_alter_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240819_061909_alter_table_user cannot be reverted.\n";

        return false;
    }
    */
}
