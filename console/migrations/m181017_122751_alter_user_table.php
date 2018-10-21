<?php

use yii\db\Migration;

/**
 * Class m181017_122751_alter_user_table
 */
class m181017_122751_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user%}}', 'about', $this->text());
        $this->addColumn('{{%user%}}', 'type', $this->integer());
        $this->addColumn('{{%user%}}', 'nickname', $this->string());
        $this->addColumn('{{%user%}}', 'picture', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user%}}', 'picture');
        $this->dropColumn('{{%user%}}', 'nickname');
        $this->dropColumn('{{%user%}}', 'type');
        $this->dropColumn('{{%user%}}', 'about');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181017_122751_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
