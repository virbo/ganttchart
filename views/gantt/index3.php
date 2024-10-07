<?php
use yii\helpers\Html;
use yii\helpers\Json;  // Import the Json helper

/* @var $this yii\web\View */
/* @var $projects app\models\Projects[] */
/* @var $tasks app\models\Tasks[] */

$this->title = 'Gantt Chart';
$this->registerJsFile('https://www.gstatic.com/charts/loader.js', ['depends' => [\yii\web\JqueryAsset::class]]);

// Convert PHP array to JSON format for JavaScript
$tasksJson = Json::encode($tasks);

$js = <<<JS
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    var tasks = $tasksJson;  // Now 'tasks' is defined and contains PHP data

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task ID');
        data.addColumn('string', 'Task Name');
        data.addColumn('date', 'Start Date');
        data.addColumn('date', 'End Date');
        data.addColumn('number', 'Duration');
        data.addColumn('number', 'Percent Complete');
        data.addColumn('string', 'Dependencies');

        // Iterate through tasks and map data for the Gantt chart
        data.addRows(tasks.map(function(task) {
            var startDate = new Date(task.start_date);
            var endDate = new Date(task.end_date);
            var progress = task.latest_progress ? task.latest_progress.progress : 0;
            var dependencies = task.dependencies ? task.dependencies.join(',') : null;
            
            return [
                task.task_id.toString(), 
                task.name, 
                startDate, 
                endDate, 
                null, 
                progress, 
                dependencies
            ];
        }));

        var options = {
            height: 500,
            gantt: {
                criticalPathEnabled: true,
                criticalPathStyle: {
                    stroke: '#e64a19',
                    strokeWidth: 5
                },
                labelStyle: {
                    fontName: 'Arial',
                    fontSize: 12
                }
            }
        };

        var chart = new google.visualization.Gantt(document.getElementById('gantt_chart'));
        chart.draw(data, options);
    }
JS;

$this->registerJs($js);
?>

<div class="gantt-chart-container">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="gantt_chart" style="width: 100%; height: 500px;"></div>
</div>
