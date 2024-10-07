<?php

namespace app\models\gii;

use Yii;

/**
 * This is the model class for table "dependencies".
 *
 * @property int $dependency_id
 * @property int $task_id
 * @property int $depends_on
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Tasks $dependsOn
 * @property Tasks $task
 */
class Dependencies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dependencies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'depends_on'], 'required'],
            [['task_id', 'depends_on', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['task_id', 'depends_on', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::class, 'targetAttribute' => ['task_id' => 'task_id']],
            [['depends_on'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::class, 'targetAttribute' => ['depends_on' => 'task_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dependency_id' => 'Dependency ID',
            'task_id' => 'Task ID',
            'depends_on' => 'Depends On',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[DependsOn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDependsOn()
    {
        return $this->hasOne(Tasks::class, ['task_id' => 'depends_on']);
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::class, ['task_id' => 'task_id']);
    }
}
