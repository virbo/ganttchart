<?php

namespace app\models;

use app\models\gii\Projects;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class ProjectsExt extends Projects
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }
}
