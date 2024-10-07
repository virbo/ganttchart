<?php

use app\models\TasksExt;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TasksExtSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks Exts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-ext-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks Ext', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'project_id',
                'value' => 'project.name'
            ],
            'parent_id',
            'name',
            'start_date',
            //'end_date',
            //'progress',
            //'status',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TasksExt $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'task_id' => $model->task_id]);
                }
            ],
        ],
    ]); ?>


</div>