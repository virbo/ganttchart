<?php

namespace app\models;

use app\models\gii\Dependencies;
use app\models\gii\Tasks;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class TasksExt extends Tasks
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    /**
     * Get the latest progress of a task.
     */
    public function getLatestProgress()
    {
        // Mengambil progres terbaru berdasarkan task_id
        return $this->hasOne(TaskProgressExt::class, ['task_id' => 'task_id'])
            ->orderBy(['progress_id' => SORT_DESC]);  // Ambil berdasarkan progress terbaru
    }

    /**
     * Get dependencies of a task.
     */
    public function getDependenc()
    {
        return $this->hasMany(Dependencies::class, ['task_id' => 'task_id'])->select('depends_on')->column();
    }
}
