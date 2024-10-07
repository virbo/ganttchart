<?php
use yii\helpers\Html;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $projects app\models\Projects[] */
/* @var $tasks app\models\Tasks[] */

$this->title = 'Gantt Chart';
$this->registerCssFile('https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css');
$this->registerJsFile('https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js', ['depends' => [\yii\web\JqueryAsset::class]]);

// Encode PHP data into JSON format
$tasksJson = Json::encode($tasks);
?>

<div class="gantt-chart-container">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="gantt_chart" style="width: 100%; height: 500px;"></div>
</div>

<?php
$js = <<<JS
    // Initialize DHTMLX Gantt Chart
    gantt.config.xml_date = "%Y-%m-%d";  // Date format for DHTMLX
    gantt.init("gantt_chart");  // Initialize the chart

    // Convert JSON tasks from backend to frontend format
    var tasks = {
        data: $tasksJson.map(function(task) {
            return {
                id: task.task_id,
                text: task.name,
                start_date: task.start_date,
                end_date: task.end_date,  // End date included
                progress: task.latest_progress ? task.latest_progress.progress / 100 : 0, // Convert progress to 0-1 scale
                parent: task.parent_id ? task.parent_id : 0  // Parent task handling
            };
        })
    };

    // Load data into Gantt chart
    gantt.parse(tasks);
JS;

$this->registerJs($js);
?>
