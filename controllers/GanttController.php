<?php

namespace app\controllers;

use app\models\ProjectsExt;
use app\models\TasksExt;
use yii\web\Controller;

class GanttController extends Controller
{
    public function actionIndex()
    {
        // Mengambil semua proyek dan tugas beserta progress dan dependencies-nya
        $projects = ProjectsExt::find()->all();
        $tasks = TasksExt::find()->all();
        // $tasks = TasksExt::find()->with(['latestProgress', 'dependenc'])->all();

        return $this->render('index', [
            'projects' => $projects,
            'tasks' => $tasks,
        ]);
    }
}
