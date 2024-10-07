<?php

namespace app\models;

use app\models\gii\Dependencies;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class DependenciesExt extends Dependencies
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }
}
