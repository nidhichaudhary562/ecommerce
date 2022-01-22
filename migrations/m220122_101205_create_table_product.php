<?php
use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220122_101205_create_table_product
 */
class m220122_101205_create_table_product extends Migration
{

    /**
     *
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = Yii::$app->db->getTableSchema('{{%product}}');
        if (empty($table)) {
            $this->createTable('{{%product}}', [
                'id' => $this->primaryKey(),
                'product_category' => $this->string('255')
                    ->notNull()
                    ->defaultValue(NULL),
                'product_detail' => $this->text()
                    ->notNull()
                    ->defaultValue(NULL)
            ]);
        }
    }

    /**
     *
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = Yii::$app->db->getTableSchema('{{%product}}');
        if (! empty($table)) {
            $this->dropTable('{{%product}}');
        }
    }

    /*
     * // Use up()/down() to run migration code without a transaction.
     * public function up()
     * {
     *
     * }
     *
     * public function down()
     * {
     * echo "m220122_101205_create_table_product cannot be reverted.\n";
     *
     * return false;
     * }
     */
}
