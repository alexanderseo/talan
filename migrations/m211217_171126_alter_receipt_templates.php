<?php

use yii\db\Migration;

/**
 * Class m211217_171126_alter_receipt_templates
 */
class m211217_171126_alter_receipt_templates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE receipt_templates CHANGE COLUMN filename file_name VARCHAR(255) AFTER id;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_171126_alter_receipt_templates cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211217_171126_alter_receipt_templates cannot be reverted.\n";

        return false;
    }
    */
}
