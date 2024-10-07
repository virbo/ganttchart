<?php

namespace app\controllers;

use app\models\ProjectsExt;
use app\models\ProjectsExtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectsController implements the CRUD actions for ProjectsExt model.
 */
class ProjectsController extends Controller
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
     * Lists all ProjectsExt models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProjectsExtSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectsExt model.
     * @param int $project_id Project ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($project_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($project_id),
        ]);
    }

    /**
     * Creates a new ProjectsExt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProjectsExt();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'project_id' => $model->project_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectsExt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $project_id Project ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($project_id)
    {
        $model = $this->findModel($project_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'project_id' => $model->project_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectsExt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $project_id Project ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($project_id)
    {
        $this->findModel($project_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectsExt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $project_id Project ID
     * @return ProjectsExt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($project_id)
    {
        if (($model = ProjectsExt::findOne(['project_id' => $project_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
