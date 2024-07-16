<?php

use yii\db\Migration;

/**
 * Class m240715_054829_fix_video_updated
 */
class m240715_054829_fix_video_updated extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%video}}', 'updated_at', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('{{%video}}', 'updated_at');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240715_054829_fix_video_updated cannot be reverted.\n";

        return false;
    }
    */
}
