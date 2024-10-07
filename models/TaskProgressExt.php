<?php

namespace app\models;

use app\models\gii\TaskProgress;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class TaskProgressExt extends TaskProgress
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }
}
