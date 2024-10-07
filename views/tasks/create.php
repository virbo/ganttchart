<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TasksExt $model */

$this->title = 'Create Tasks Ext';
$this->params['breadcrumbs'][] = ['label' => 'Tasks Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-ext-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
