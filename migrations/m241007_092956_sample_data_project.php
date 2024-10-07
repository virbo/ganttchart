<?php

use yii\db\Migration;

/**
 * Class m241007_092956_sample_data_project
 */
class m241007_092956_sample_data_project extends Migration
{
    public $tableName = '{{%projects}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert($this->tableName, ['name', 'description'], [
            ['Website Redesign', 'Proyek untuk merancang ulang website perusahaan.'],
            ['Mobile App Development', 'Pengembangan aplikasi mobile untuk platform perusahaan.']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($this->tableName, ['name' => ['Website Redesign', 'Mobile App Development']]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241007_092956_sample_data_project cannot be reverted.\n";

        return false;
    }
    */
}
