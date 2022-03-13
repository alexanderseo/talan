<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m211216_203947_create_table_receipt_templates
 */
class m211216_203947_create_table_receipt_templates extends Migration
{

    private const TABLE_NAME = 'receipt_templates';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME,
            [
                'id' => Schema::TYPE_PK,
                'filename' => Schema::TYPE_STRING . ' NOT NULL',
                'title' => Schema::TYPE_STRING . ' NOT NULL',
                'deleted' => Schema::TYPE_TINYINT . ' DEFAULT 0'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211216_203947_create_table_receipt_templates cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211216_203947_create_table_receipt_templates cannot be reverted.\n";

        return false;
    }
    */
}
