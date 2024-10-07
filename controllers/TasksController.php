<?php

namespace app\controllers;

use app\models\TasksExt;
use app\models\TasksExtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TasksController implements the CRUD actions for TasksExt model.
 */
class TasksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TasksExt models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TasksExtSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TasksExt model.
     * @param int $task_id Task ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($task_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($task_id),
        ]);
    }

    /**
     * Creates a new TasksExt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TasksExt();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'task_id' => $model->task_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TasksExt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $task_id Task ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($task_id)
    {
        $model = $this->findModel($task_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'task_id' => $model->task_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TasksExt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $task_id Task ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($task_id)
    {
        $this->findModel($task_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TasksExt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $task_id Task ID
     * @return TasksExt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($task_id)
    {
        if (($model = TasksExt::findOne(['task_id' => $task_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
