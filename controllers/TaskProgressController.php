<?php

namespace app\controllers;

use app\models\TaskProgressExt;
use app\models\TaskProgressExtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskProgressController implements the CRUD actions for TaskProgressExt model.
 */
class TaskProgressController extends Controller
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
     * Lists all TaskProgressExt models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskProgressExtSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TaskProgressExt model.
     * @param int $progress_id Progress ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($progress_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($progress_id),
        ]);
    }

    /**
     * Creates a new TaskProgressExt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TaskProgressExt();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'progress_id' => $model->progress_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TaskProgressExt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $progress_id Progress ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($progress_id)
    {
        $model = $this->findModel($progress_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'progress_id' => $model->progress_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TaskProgressExt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $progress_id Progress ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($progress_id)
    {
        $this->findModel($progress_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TaskProgressExt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $progress_id Progress ID
     * @return TaskProgressExt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($progress_id)
    {
        if (($model = TaskProgressExt::findOne(['progress_id' => $progress_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
