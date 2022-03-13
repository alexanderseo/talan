<?php

use yii\db\Migration;

/**
 * Class m211217_172045_alter_receipt_templates_change_title
 */
class m211217_172045_alter_receipt_templates_change_title extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE receipt_templates CHANGE COLUMN title title_template VARCHAR(255) AFTER file_name;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_172045_alter_receipt_templates_change_title cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211217_172045_alter_receipt_templates_change_title cannot be reverted.\n";

        return false;
    }
    */
}
