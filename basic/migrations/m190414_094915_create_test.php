<?php

use yii\db\Migration;

/**
 * Class m190414_094915_create_test
 */
class m190414_094915_create_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('test', [
             'id' => $this->primaryKey(),
             'price' => $this->integer()->defaultValue(100)->notNull(),
             'about' => $this->string(),
             'txt' => $this->string(50),
             'article' => $this->text()

         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190414_094915_create_test cannot be reverted.\n";

        return false;
    }
    */
}
