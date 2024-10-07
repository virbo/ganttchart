<?php

namespace app\models\gii;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $task_id
 * @property int $project_id
 * @property int|null $parent_id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property float $progress
 * @property string $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Dependencies[] $dependencies
 * @property Dependencies[] $dependencies0
 * @property Tasks $parent
 * @property Projects $project
 * @property TaskProgress[] $taskProgresses
 * @property Tasks[] $tasks
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'name', 'start_date', 'end_date'], 'required'],
            [['project_id', 'parent_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['project_id', 'parent_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['progress'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 20],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::class, 'targetAttribute' => ['project_id' => 'project_id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::class, 'targetAttribute' => ['parent_id' => 'task_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'project_id' => 'Project ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'progress' => 'Progress',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Dependencies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDependencies()
    {
        return $this->hasMany(Dependencies::class, ['task_id' => 'task_id']);
    }

    /**
     * Gets query for [[Dependencies0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDependencies0()
    {
        return $this->hasMany(Dependencies::class, ['depends_on' => 'task_id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Tasks::class, ['task_id' => 'parent_id']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::class, ['project_id' => 'project_id']);
    }

    /**
     * Gets query for [[TaskProgresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaskProgresses()
    {
        return $this->hasMany(TaskProgress::class, ['task_id' => 'task_id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::class, ['parent_id' => 'task_id']);
    }
}
