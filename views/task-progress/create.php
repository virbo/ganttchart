<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskProgressExt $model */

$this->title = 'Create Task Progress Ext';
$this->params['breadcrumbs'][] = ['label' => 'Task Progress Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-progress-ext-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
