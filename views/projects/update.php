<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectsExt $model */

$this->title = 'Update Projects Ext: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'project_id' => $model->project_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projects-ext-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
