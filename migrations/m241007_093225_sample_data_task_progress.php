<?php

use yii\db\Migration;

/**
 * Class m241007_093225_sample_data_tasks_progress
 */
class m241007_093225_sample_data_task_progress extends Migration
{
    public $tableName = '{{%task_progress}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert($this->tableName, ['task_id', 'progress'], [
            [1, 100], // Task 'Initial Brainstorming' completed
            [2, 50],  // Task 'User Research' 50% completed
            [5, 25],  // Task 'UI/UX Design' 25% completed
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($this->tableName, ['task_id' => [1, 2, 5]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_093225_sample_data_tasks_progress cannot be reverted.\n";

        return false;
    }
    */
}
