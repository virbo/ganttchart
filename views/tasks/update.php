<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TasksExt $model */

$this->title = 'Update Tasks Ext: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'task_id' => $model->task_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tasks-ext-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
