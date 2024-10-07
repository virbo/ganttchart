<?php

use yii\db\Migration;

/**
 * Class m241007_093347_sample_data_tasks_dependencies
 */
class m241007_093347_sample_data_tasks_dependencies extends Migration
{
    public $tableName = '{{%dependencies}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert($this->tableName, ['task_id', 'depends_on'], [
            // Dependencies for 'Website Redesign'
            [2, 1],  // 'User Research' depends on 'Initial Brainstorming'
            [3, 2],  // 'Wireframe Design' depends on 'User Research'

            // Dependencies for 'Mobile App Development'
            [5, 4],  // 'UI/UX Design' depends on 'Requirements Gathering'
            [6, 5],  // 'Frontend Development' depends on 'UI/UX Design'
            [7, 6],  // 'Backend Development' depends on 'Frontend Development'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($this->tableName, ['task_id' => [2, 3, 5, 6, 7]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_093347_sample_data_tasks_dependencies cannot be reverted.\n";

        return false;
    }
    */
}
