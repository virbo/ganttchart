<?php

use yii\db\Migration;

/**
 * Class m241007_061625_task_progress
 */
class m241007_061625_task_progress extends Migration
{
    public $tableName = '{{%task_progress}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'progress_id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'progress' => $this->decimal(5, 2)->defaultValue(0)->notNull(),
            'created_at' => $this->integer()->defaultValue(0),
            'updated_at' => $this->integer()->defaultValue(0),
            'created_by' => $this->integer()->defaultValue(0),
            'updated_by' => $this->integer()->defaultValue(0),
        ]);

        // Add foreign key for task_id
        $this->addForeignKey(
            'fk-task_progress-task_id',
            $this->tableName,
            'task_id',
            '{{%tasks}}',
            'task_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-task_progress-task_id', $this->tableName);
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_061625_task_progress cannot be reverted.\n";

        return false;
    }
    */
}
