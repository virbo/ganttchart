<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectsExt $model */

$this->title = 'Create Projects Ext';
$this->params['breadcrumbs'][] = ['label' => 'Projects Exts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-ext-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
