<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskProgressExt $model */

$this->title = 'Update Task Progress Ext: ' . $model->progress_id;
$this->params['breadcrumbs'][] = ['label' => 'Task Progress Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->progress_id, 'url' => ['view', 'progress_id' => $model->progress_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-progress-ext-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
