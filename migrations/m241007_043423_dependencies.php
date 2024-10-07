<?php

use yii\db\Migration;

/**
 * Class m241007_043423_dependencies
 */
class m241007_043423_dependencies extends Migration
{
    public $tableName = '{{%dependencies}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'dependency_id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'depends_on' => $this->integer()->notNull(),
            'created_at' => $this->integer()->defaultValue(0),
            'updated_at' => $this->integer()->defaultValue(0),
            'created_by' => $this->integer()->defaultValue(0),
            'updated_by' => $this->integer()->defaultValue(0),
        ]);

        // Add foreign key for task_id
        $this->addForeignKey(
            'fk-dependencies-task_id',
            $this->tableName,
            'task_id',
            '{{%tasks}}',
            'task_id',
            'CASCADE'
        );

        // Add foreign key for depends_on
        $this->addForeignKey(
            'fk-dependencies-depends_on',
            $this->tableName,
            'depends_on',
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
        $this->dropForeignKey('fk-dependencies-task_id', $this->tableName);
        $this->dropForeignKey('fk-dependencies-depends_on', $this->tableName);
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_043423_dependencies cannot be reverted.\n";

        return false;
    }
    */
}
