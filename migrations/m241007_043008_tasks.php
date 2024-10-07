<?php

use yii\db\Migration;

/**
 * Class m241007_043008_tasks
 */
class m241007_043008_tasks extends Migration
{
    public $tableName = '{{%tasks}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable($this->tableName, [
            'task_id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->null(),
            'name' => $this->string(255)->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'progress' => $this->decimal(5, 2)->defaultValue(0)->notNull(),
            'status' => $this->string(20)->notNull()->defaultValue('Pending'),
            // 'status' => "ENUM('Pending', 'In Progress', 'Completed') NOT NULL DEFAULT 'Pending'",
            'created_at' => $this->integer()->defaultValue(0),
            'updated_at' => $this->integer()->defaultValue(0),
            'created_by' => $this->integer()->defaultValue(0),
            'updated_by' => $this->integer()->defaultValue(0),
        ]);

        // Add foreign key for project_id
        $this->addForeignKey(
            'fk-tasks-project_id',
            $this->tableName,
            'project_id',
            '{{%projects}}',
            'project_id',
            'CASCADE'
        );

        // Add foreign key for parent_id (self-reference)
        $this->addForeignKey(
            'fk-tasks-parent_id',
            $this->tableName,
            'parent_id',
            $this->tableName,
            'task_id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tasks-project_id', $this->tableName);
        $this->dropForeignKey('fk-tasks-parent_id', $this->tableName);
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_043008_tasks cannot be reverted.\n";

        return false;
    }
    */
}
