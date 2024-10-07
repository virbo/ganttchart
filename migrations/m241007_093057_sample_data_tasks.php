<?php

use yii\db\Migration;

/**
 * Class m241007_093057_sample_data_tasks
 */
class m241007_093057_sample_data_tasks extends Migration
{
    public $tableName = '{{%tasks}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert($this->tableName, ['project_id', 'parent_id', 'name', 'start_date', 'end_date', 'status'], [
            // Tasks for project 'Website Redesign'
            [1, null, 'Initial Brainstorming', '2024-10-01', '2024-10-02', 'Completed'],
            [1, 1, 'User Research', '2024-10-03', '2024-10-05', 'In Progress'],
            [1, 1, 'Wireframe Design', '2024-10-06', '2024-10-10', 'Pending'],

            // Tasks for project 'Mobile App Development'
            [2, null, 'Requirements Gathering', '2024-10-01', '2024-10-03', 'Completed'],
            [2, 4, 'UI/UX Design', '2024-10-04', '2024-10-08', 'In Progress'],
            [2, 4, 'Frontend Development', '2024-10-09', '2024-10-15', 'Pending'],
            [2, 4, 'Backend Development', '2024-10-16', '2024-10-25', 'Pending'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($this->tableName, ['project_id' => [1, 2]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_093057_sample_data_tasks cannot be reverted.\n";

        return false;
    }
    */
}
